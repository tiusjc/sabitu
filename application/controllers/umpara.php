<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Umpara extends MY_Controller{


    function __construct(){
      parent::__construct();
      $this->output->enable_profiler(TRUE);
    }

    public function index(){
      $tabela = $this->form_sigla.'_'.$this->uri->segment(3);
    
      $this->crud->set_subject('Cadastro de '+ $tabela);

      $this->crud->set_relation('form_id','form','descricao');
      $this->crud->display_as('form_id','Formulário');
      $this->crud->display_as('descricao','Descrição');
      $this->crud->display_as('status','Status');

      $this->crud->set_table($tabela);

      $output = $this->crud->render();

      $this->load->view( 'gerenciar',$output);
    }
  }
