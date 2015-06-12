<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Relatorios extends MY_Controller {

    function __construct(){

      parent::__construct();
      $this->load->model('form_model');
      $this->load->model('form_cadastro_model');
      $this->output->enable_profiler(TRUE);

    }


    public function index(){
      $tabela        = $this->form_sigla;
      $tabela_campos = "campos";

      $form_existe  = $this->form_model->getForm_existe( $this->form_sigla );

      if( !$form_existe ){
        $this->session->set_flashdata('mensagem',
        '<div class="alert alert-danger">Atenção: O Formulário '. $this->form_sigla. ' ainda não existe!</div>');
        redirect('form_cadastro');
      }
      $this->crud->set_table( $this->form_sigla );

      $detalhes = array();
      $detalhes = $this->form_cadastro_model->getFieldsLabelRules($this->form_id, "field,label", 0, 1, $tabela_campos);

      for($i=0;$i < count($detalhes);$i++){
          $this->crud->set_relation_n_n( $detalhes[$i]["field"], $tabela.'_tem_'.$detalhes[$i]["field"] ,$tabela.'_'.$detalhes[$i]["field"],
                                                  $tabela.'_id', $tabela.'_'.$detalhes[$i]["field"].'_id','descricao',
                                                  null, array( 'form_id' => $this->form_id));
      }

      $this->crud->columns        ( $this->form_cadastro_model->getFields($this->form_id, 0, 1, 0  ,$tabela_campos ));
      $this->crud->fields         ( $this->form_cadastro_model->getFields($this->form_id, 0, 0, 1  ,$tabela_campos ));

      $this->crud->display_as('usuario_id' ,'Usuário');
      $this->crud->display_as('form_id'    ,'Formulário');
      $this->crud->unset_delete();
      $this->crud->unset_edit();
      $this->crud->unset_add();


      $this->crud->set_relation('usuario_id', 'usuarios', 'nome');
      $this->crud->set_relation('form_id'   , 'form'    , 'descricao');

      $upload = array();
      $upload = $this->form_cadastro_model->getFieldsLabelRules($this->form_id, "field,upload", 1,0, $tabela_campos);

      for($i=0;$i<count($upload);$i++){
          $this->crud->set_field_upload( $upload[$i]["field"], 'assets/uploads/files');
      }

      $this->load->vars($this->crud->render());
      $this->load->view( 'gerenciar');
    }
  }
