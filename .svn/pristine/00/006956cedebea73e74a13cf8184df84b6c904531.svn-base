<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Processos extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->dbforge();
        $this->output->enable_profiler(TRUE);
        
    }

    public function index(){

     try{
        
                
        $tabela = "processo_seletivo";
        
        $this->crud->set_table( $tabela );

        $this->crud->set_subject('Cadastro de Processos Seletivos');
        
        $this->crud->columns('nomedoprograma','sigla','data_inicio_selecao','data_fim_selecao','status','rodape');
        
        $this->crud->fields('nomedoprograma','sigla','data_inicio_selecao','data_fim_selecao','status','rodape');
      
        $this->crud->required_fields('sigla');
        
      // $this->crud->callback_before_update(array($this, '_prepare_field'));
      // $this->crud->callback_before_insert(array($this, '_prepare_field'));

        $this->crud->callback_after_insert(array($this, 'cria_table'));
        $this->crud->callback_after_update(array($this, 'cria_table'));
        
     

        // if($this->crud->getState() == 'insert' || $this->crud->getState() == 'insert_validation' ||
        //    $this->crud->getState() == 'update' || $this->crud->getState() == 'update_validation')
        //    $this->crud->set_rules('sigla','Sigla','callback_existe_table');

        $data["inscricao_id"] = $this->sistema_id;
        $this->load->vars($data);
        $this->load->vars($this->crud->render());
        $this->load->view('gerenciar.php');    

      } catch(Exception $e) {
        fb::info($e->getMessage().' --- '.$e->getTraceAsString());
      }    
    }

    public function _prepare_field( $array_post ){
      if($this->crud->getState() == 'update' || $this->crud->getState() == 'add') {
        // $array_post['data_inicio_selecao'] = date('Y-m-d H:i:s');
        // $array_post['data_fim_selecao'] = date('Y-m-d H:i:s');

      }
      return $array_post;
     }

      function backup(){

        $this->load->dbutil();

        $table01 = $this->input->post('sigla');
        $table02 = $this->input->post('sigla')."_linhas";
        $table03 = "campos_".$this->input->post('sigla');

        $prefs = array(
                        'tables'      => array($table01, $table02, $table03),  // Array of tables to backup.
                        'ignore'      => array(),           // List of tables to omit from the backup
                        'format'      => 'zip',             // gzip, zip, txt
                        'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                        'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                        'newline'     => "\n"               // Newline character used in backup file
                      );

        $this->dbutil->backup($prefs);

        $backup =& $this->dbutil->backup($prefs);

        $this->load->helper('file');
        write_file('assets/uploads/files/'.$table01.'.zip', $backup); 

        // Load the download helper and send the file to your desktop
        //$this->load->helper('download');
       // force_download('mybackup.gz', $backup);

      }

  

  function cria_table( $array_post ){


        if (!$this->db->table_exists( 'user_logs' ) ){

            $fields = array(
                        
                         'id' => array(
                         'type'                 => 'INT',
                         'constraint'           => 11, 
                         'auto_increment'       => TRUE
                         ),

                         'candidato_id'         => array(
                         'type'                 => 'INT',
                         'constraint'           => 11 
                         ),

                         'processo_seletivo_id' => array(
                         'type'                 => 'INT',
                         'constraint'           => 11
                         ),
                          
                         'action'               => array(
                         'type'                 => 'VARCHAR',
                         'constraint'           => 200
                         ),  

                         'data'                => array(
                         'type'                => 'DATETIME'
                         ),

            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table( 'user_logs' );
        }

        // CRIA A TABELA DE PROCESSO SELETIVO do 
        $nome_tabela = $array_post['sigla'];
      
        $this->dbforge->drop_table($nome_tabela);
        
        $fields = array(
                      
                      'id'               => array(
                      'type'           => 'INT',
                      'constraint'     => 11, 
                      'auto_increment' => TRUE
                       ),

                      'candidato_id'        => array(
                      'type'           => 'INT',
                      'constraint'     => 11 
                       ),

                       'processo_seletivo_id'  => array(
                           'type'              => 'INT',
                           'constraint'        => 11
        
                       ),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($nome_tabela);
        
        //CRIA A TABELA DE LINHAS DO PROCESSO SELETIVO LINHAS DE PESQUISA
        $nome_tabela = $array_post['sigla']."_linhas";
        
        $this->dbforge->drop_table($nome_tabela);
    
        $fields = array(
                      
                      $array_post['sigla'].'_id' => array(
                      'type'               => 'INT',
                      'constraint'         => 11 
                      ),

                      'linhadepesquisa_id' => array(
                      'type'               => 'INT',
                      'constraint'         => 11 
                       
                      ),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key($array_post['sigla'].'_id', TRUE);
        $this->dbforge->add_key('linhadepesquisa_id'      , TRUE);
        $this->dbforge->create_table($nome_tabela);
        return $array_post;
       
    }





}