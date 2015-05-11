<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Processo extends MY_Controller {

    function __construct() {
        parent::__construct();
        
    }
    public function index(){

     try{
        $this->crud->set_table('processo_seletivo');
        $this->crud->set_subject('Cadastro de Processos Seletivos');

        if (!$this->adm){
         $this->crud->where('candidato_id',$this->candidato_id);
        }
        
        $this->output->enable_profiler(TRUE);
        
        $this->crud->columns('nomedoprograma','sigla','data_inicio_selecao','data_fim_selecao','status','rodape');
        
        $this->crud->fields('nomedoprograma','sigla','data_inicio_selecao','data_fim_selecao','status','rodape');
      
        $this->crud->required_fields('sigla');
        
        $this->crud->callback_before_update(array($this, '_prepare_field'));
        $this->crud->callback_before_insert(array($this, '_prepare_field'));

        $this->crud->callback_after_insert(array($this, 'cria_table'));
        $this->crud->callback_after_update(array($this, 'cria_table'));
        
        $this->crud->callback_after_delete(array($this, 'dele_table'));

        
        if($this->crud->getState() == 'insert' || $this->crud->getState() == 'insert_validation')
          $this->crud->set_rules('sigla','Sigla','callback_existe_table');

        $data["inscricao_id"] = $this->inscricao_id;
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


     function existe_table($nome_tabela){
      if($this->db->table_exists($nome_tabela) ){
          $this->form_validation->set_message('existe_table','A tabela '.$nome_tabela.' já existe.');
          return false;
      }else{
        return true;
      }
    } 

    function dele_table(){
       $nome_tabela = $this->input->post('sigla');
       $this->dbforge->drop_table($nome_tabela);

       return true;
       
    }

        function cria_table( $array_post ){

        $nome_tabela = $array_post['sigla'];

    
        $fields = array(
                      'id' => array(
                              'type'           => 'INT',
                              'constraint'     =>    11, 
                              'auto_increment' =>   TRUE
                      ),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($nome_tabela, TRUE);
        return $array_post ;
       
    }





}