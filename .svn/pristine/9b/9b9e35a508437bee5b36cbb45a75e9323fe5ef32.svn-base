<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class usuarios extends MY_Controller {
    
    function __construct(){

      parent::__construct();
      $this->load->model('form_cadastro_model');
      
      $this->session->set_userdata( 'check_id', $this->usuarios_id );
      $this->output->enable_profiler(TRUE);
    }
    

    public function index(){
      
      $this->crud->set_table('usuarios');

      if (!$this->adm){
         $this->crud->where('id',$this->usuarios_id);
         $this->crud->unset_add();
         $this->crud->unset_print();
         $this->crud->unset_export();
         $this->crud->unset_delete();
      }

      $this->crud->set_rules('cpf'      ,'cpf'     ,'required|valid_cpf');
      $this->crud->set_rules('cep'      ,'cep'     ,'required|valid_campo[8]');
      $this->crud->set_rules('foneFixo' ,'foneFixo','required|valid_campo[12]');
      $this->crud->set_rules('foneCel'  ,'foneCel' ,'required|valid_campo[13]');
    
      $this->crud->required_fields('nome' , 'sexo','cpf','rg','email','endereco','bairro','cidade','uf','cep','estadoCivil','foneFixo','FoneCel');
      $this->crud->columns('nome','email','foneFixo','foneCel','dataCadastro');
      
      $this->crud->callback_before_update(array($this, '_prepare_field'));
      $this->crud->callback_before_insert(array($this, '_prepare_field'));
      
      $this->crud->field_type( 'senha', 'hidden');
      $this->crud->field_type( 'dataCadastro', 'hidden');
      

      $this->load->vars($this->crud->render());
      $this->load->view( 'gerenciar');       
    }
    
    public function _prepare_field( $array_post ) {
      if($this->crud->getState() == 'update' || $this->crud->getState() == 'add') {
        $array_post['dataCadastro'] = date('Y-m-d H:i:s');
      }
   
      return $array_post;
    }

    public function after_delete( $primary_key ) {
       $this->session->set_userdata( 'inscricao_id', 0 );
       $this->inscricao_id = 0;
       return $this->db->insert('user_logs', array('usuarios_id' => $this->usuarios_id,'form_id' => $primary_key,'action'=>'delete', 'data' => date('Y-m-d H:i:s')));
    }
  }

