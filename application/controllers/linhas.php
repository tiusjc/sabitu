<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Linhas extends MY_Controller {
	function index(){

      $this->crud->set_table('linhadepesquisa');
      $this->crud->set_subject('Cadastro de Linhas de Pesquisa');

      $this->crud->columns('form_id','descricao','status');
      $this->crud->display_as('form_id','Formulários');
      $this->crud->display_as('descricao','Descrição');
      $this->crud->display_as('status','Estado');


      $this->crud->set_relation('form_id','form','descricao');

      $this->load->vars($this->crud->render());
      $this->load->view('gerenciar.php');
    }

}
