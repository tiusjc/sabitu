<?php
  class Adm extends MY_Controller{
   
    
    function __construct(){
      parent::__construct();
      $this->output->enable_profiler(TRUE);
    }
    

    public function adm(){
      
      $this->crud->set_table('adm');
      $this->crud->set_subject('Cadastro de Usuários');
      
      $usuarios = preencher_dropdown('usuario','id','email');
      $this->crud->display_as('usuario_id','Usuário');
      $this->crud->field_type('usuario_id','dropdown',$usuarios);
      
      $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
         
      $output = $this->crud->render(); 
       
      $this->load->view( 'gerenciar',$output);     
    }

    private function set_rules() {
      $this->crud->set_rules('field','field','required');
      if($this->crud->getState() == 'insert' || $this->crud->getState() == 'insert_validation'){
           $this->crud->set_rules('field','field','callback_existe_field_insc');
      }
    }

    function existe_field_insc($campo){

      if (!$this->db->field_exists($campo, 'inscricao')){
         $this->form_validation->set_message('existe_field_insc','O campo %s ainda não existe na tabela de inscrição.');
         return false;
      }else{
         return true;
      }
      
    }

    function existe_field_camp($campo){
        if ($this->db->field_exists($campo, 'campos')){
           $this->form_validation->set_message('existe_field_camp','O campo %s já existe na tabela de campos.');
           return false;
        }else{
           return true;
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

  }
?>
