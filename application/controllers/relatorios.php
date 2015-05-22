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
      $tabela_campos = "campos";

      $form_existe  = $this->form_model->getForm_existe( $this->form_sigla );

      if( !$form_existe ){
        $this->session->set_flashdata('mensagem',
        '<div class="alert alert-danger">Atenção: O Formulário '. $this->form_sigla. ' ainda não existe!</div>');
        redirect('form_cadastro');
      }
      $this->crud->set_table( $this->form_sigla );



      $this->crud->display_as('usuario_id' ,'Usuário');
      $this->crud->display_as('form_id'    ,'Formulário');
      $this->crud->unset_delete();
      $this->crud->unset_edit();
      $this->crud->unset_add();


      $this->crud->set_relation('usuario_id', 'usuarios', 'nome');
      $this->crud->set_relation('form_id'   , 'form'    , 'descricao');

      $upload = array();
      $upload = $this->form_cadastro_model->getFieldsLabelRules($this->form_id, "field,upload", 1,$tabela_campos);

      for($i=0;$i<count($upload);$i++){
          $this->crud->set_field_upload( $upload[$i]["field"], 'assets/uploads/files');
      }

      $this->load->vars($this->crud->render());
      $this->load->view( 'gerenciar');
    }
  }
