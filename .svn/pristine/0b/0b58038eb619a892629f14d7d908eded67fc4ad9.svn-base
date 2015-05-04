<?php
  class Adm extends MY_Controller{
   
    
    function __construct(){
      parent::__construct();
      $this->output->enable_profiler(TRUE);
    }
    

    public function index(){
      
      $this->crud->set_subject('Cadastro de Administradores');
      
      $usuarios = preencher_dropdown('usuarios','id','email','');
      $this->crud->display_as('usuario_id','Usuário');
      $this->crud->field_type('usuario_id','dropdown',$usuarios);
      
      $this->crud->set_table('adm');
      $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
         
      $output = $this->crud->render(); 
       
      $this->load->view( 'gerenciar',$output);     
    }
  }
?>
