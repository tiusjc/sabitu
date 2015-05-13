<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Campos extends MY_Controller {

    private $qtd_um_para_muitos;
    private $nome_tabela_um_para_muitos;

    function __construct(){
          parent::__construct();

      $this->load->model('form_cadastro_model');
      $this->load->model('usuarios_model');
      $this->load->model('campos_model');
      $this->load->model('form_model');

      $this->load->dbforge();
      $this->output->enable_profiler(TRUE);
      $this->qtd_um_para_muitxos = 0;
    }

    public function index(){

    try {
          if(!$this->form_id){
            $this->session->set_flashdata('mensagem',
            '<div class="alert alert-danger">Atenção: Selecione um Formulário '. $this->form_sigla. ' para criar campos!</div>');
            redirect('form_cadastro');
          }


          $nome_tabela_campos = "campos";

          //CRIA A TABELA DE CAMPOS

          if (!$this->db->table_exists( $nome_tabela_campos ) ){

            $fields = array(

                          'id' => array(
                          'type'           => 'INT',
                          'constraint'     => 11,
                          'auto_increment' => TRUE

                         ),

                        'form_id' => array(
                        'type'                => 'INT',
                        'constraint'          => 11
                         ),

                        'field'       => array(
                        'type'                => 'VARCHAR',
                        'constraint'          => 100

                         ),

                        'type'       => array(
                          'type'                => "ENUM( 'INT',
                                                          'TINYINT',
                                                          'DECIMAL',
                                                          'VARCHAR',
                                                          'TEXT',
                                                          'SET',
                                                          'ENUM',
                                                          'TIME',
                                                          'DATE',
                                                          'DATETIME',
                                                          'UM-PARA-MUITOS')"


                         ),


                        'size'       => array(
                          'type'                => 'VARCHAR',
                          'constraint'          => 200

                         ),

                         'label'       => array(
                          'type'                => 'VARCHAR',
                          'constraint'          => 200

                         ),

                        'rules'       => array(
                          'type'                => 'VARCHAR',
                          'constraint'          => 200

                         ),

                        'grid'       => array(
                          'type'                => 'TINYINT',
                          'constraint'          => 1,
                          'default'             => 1
                         ),

                        'add_edit'       => array(
                          'type'                => 'TINYINT',
                          'constraint'          => 1,
                          'default'             => 1

                         ),

                        'upload'       => array(
                          'type'                => 'TINYINT',
                          'constraint'          => 1,
                          'default'             => 0

                         ),

                        'ordem'       => array(
                           'type'                => 'INT',
                           'constraint'          => 2
                         ),

            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('form_id', TRUE);
            $this->dbforge->create_table($nome_tabela_campos);
          }


          $this->crud->columns("form_id", "field", "type", "size", "label", "tab_um_para_muitos","rules", "grid", "add_edit", "upload", "ordem");
          $this->crud->required_fields('field' , 'type');

          $this->crud->display_as('form_id','Formulário');
          $this->crud->display_as('type','Tipo do campo');
          $this->crud->display_as('field','Nome do campo');
          $this->crud->display_as('size','Tamanho do campo');
          $this->crud->display_as('label','Exibir como');
          $this->crud->display_as('rules','Regras de validação Ex: required|md5|min(5)|max(6)');
          $this->crud->display_as('grid','Mostra na grade');
          $this->crud->display_as('add_edit','Mostra na Inclusão/Edição');
          $this->crud->display_as('upload','Campo para upload de Arquivo');

          $this->crud->set_table( $nome_tabela_campos );
          $this->crud->order_by('form_id asc,ordem');

          $this->crud->set_subject('Cadastro de Campos');
          $this->crud->unset_export();
          $this->crud->unset_print();
          $this->crud->unset_edit();

          if( $this->form_id ){
            // $this->crud->unset_delete();
          }

          $this->crud->callback_before_insert(array($this, 'before_insert_update'));
          $this->crud->callback_before_update(array($this, 'before_insert_update'));

          $this->crud->callback_after_insert(array($this, 'cria_field'));
          $this->crud->callback_after_update(array($this, 'cria_field'));

          $this->crud->callback_before_delete(array($this, 'delete_field'));


          $this->crud->set_relation('form_id','form','descricao');

          $this->load->vars($this->crud->render());
          $this->load->view('gerenciar.php');

       } catch(Exception $e) {
           fb::info($e->getMessage().' --- '.$e->getTraceAsString());
       }
    }

   function cria_field( $array_post ){

        $nome_tabela_sigla = $this->form_model->getField($array_post['form_id'],'sigla');

        if ($array_post['type'] == 'DATETIME' || $array_post['type'] == 'TEXT') {

	         $this->db->simple_query("ALTER TABLE ".$nome_tabela_sigla." ADD ".$array_post['field']." ".$array_post['type']. " null" );

        } else {

           if( $array_post['type'] == 'UM-PARA-MUITOS' ){

               $array_post['type'] = 'VARCHAR';

               if (!$this->db->table_exists( $$nome_tabela_sigla.'_'.$array_post['field'] ) ){

                  $fields = array(

                         'id' => array(
                         'type'           => 'INT',
                         'constraint'     => 11,
                         'auto_increment' => TRUE
                         ),

                        'form_id' => array(
                        'type'                => 'INT',
                        'constraint'          => 11
                         ),

                        'descricao'       => array(
                        'type'                => 'VARCHAR',
                        'constraint'          => 100

                         ),

                        'status'       => array(
                        'type'                => 'TINYINT',
                        'constraint'          => 1

                         ),
                  );

                  $this->dbforge->add_field($fields);
                  $this->dbforge->add_key('id', TRUE);
                  $this->dbforge->add_key('form_id', TRUE);
                  $this->dbforge->create_table( $nome_tabela_sigla.'_'.$array_post['field'] );

                  // PEGA A QUANTIDADE DE CAMPOS COM DETERMINADO NOME QUE É DO TIPO "UM-PARA-MUITOS"
                  $this->qtd_um_para_muitos =   $this->campos_model->getCountField(form_id, $array_post['field']);

                  if( $qtd_um_para_muitos == 0){
                   $qtd_um_para_muitos += 1;
                  }

                  //CRIA A TABELA DE SIGLA_DETALHES
                  $this->dbforge->drop_table( $nome_tabela_sigla.'_'.$array_post['field'].'_'.$this->qtd_um_para_muitos );

                  $fields = array(

                      $nome_tabela_sigla.'_id' => array(
                      'type'               => 'INT',
                      'constraint'         => 11
                      ),

                      $array_post['field'].'_id' => array(
                      'type'               => 'INT',
                      'constraint'         => 11

                      ),
                  );

                  $this->dbforge->add_field($fields);
                  $this->dbforge->add_key($nome_tabela_sigla.'_id', TRUE);
                  $this->dbforge->add_key($array_post['field'].'_id', TRUE);
                  $this->dbforge->create_table($nome_tabela_sigla.'_'.$array_post['field'].'_'.$this->qtd_um_para_muitos);

                  $this->nome_tabela_sigla_um_para_muitos = $nome_tabela_sigla.'_'.$array_post['field'].'_'.$this->qtd_um_para_muitos;
           }

        }
        $size = "(".$array_post['size'].")";
        $this->db->simple_query("ALTER TABLE ".$nome_tabela_sigla." ADD ".$array_post['field']." ".$array_post['type'].$size);

	    return $array_post;
    }

   function delete_field( $primary_key ){
         $query_campos = $this->db->query("SELECT form_id, field FROM campos WHERE id=$primary_key");
         $campos       = $query_campos->row();
         $form_id      = $campos->form_id;
         $form_field   = $campos->field;

         $query_form = $this->db->query("SELECT sigla FROM form WHERE id=$form_id");
         $form       = $query_form->row();
         $form_sigla = $form->sigla;

  	     if ( $this->db->simple_query("ALTER TABLE $form_sigla DROP $form_field") ){
  		    return true;
  	     } else {
  		    return false;
  	     }
      }

   function before_insert_update( $array_post ) {

        if( $array_post['type'] == 'UM-PARA-MUITOS' ){
            $array_post['grid'] = 0;
            $array_post['add_edit'] = 1;
            $array_post['tab_um_para_muitos'] = $this->nome_tabela_sigla_um_para_muitos;
        }

        if($array_post['label'] == ''){
           $array_post['label'] = $array_post['field'];
        }

        return $array_post;

      }
}
}
