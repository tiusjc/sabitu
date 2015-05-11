<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inscricao extends MY_Controller{
    
    function __construct(){
      parent::__construct();
      
      $this->load->model('inscricao_model');
      $this->load->model('candidato_model');
      $this->load->model('processoseletivo_model');
      $this->session->set_userdata( 'check_id', $this->inscricao_id );
    }

    public function index(){

      $this->crud->set_table( 'processo_seletivo' );
    
      if( $this->adm ){
    
        $this->crud->add_action('Mostrar', '', 'inscricao/form/add','read-icon');
        $this->crud->unset_delete();
        $this->crud->unset_edit();
        $this->crud->unset_add();

        $this->crud->unset_read();
      }else{

          if( $this->candidato_model->valida_cadastro( $this->candidato_id ) ){
           
            redirect('inscricao/form');
         
          }else{

            redirect('candidato');  
          }
      }

      $data["inscricao_id"] = $this->inscricao_id;
      $data["mnu_can"]      = $this->candidato_id;
      $data["mnu_ins"]      = $this->processo_seletivo_id;
      $this->load->vars($data);
      $this->load->vars($this->crud->render());
      $this->load->view( 'gerenciar');
      $this->output->enable_profiler(TRUE);
    }

    public function form(){
      try {
        
        if( $this->adm ){
          $this->processo_seletivo_id    = $this->uri->segment(4);
          $this->processo_seletivo_sigla = $this->processoseletivo_model->getField($this->processo_seletivo_id,'sigla');
          $this->processo_seletivo_nome  = $this->processoseletivo_model->getField($this->processo_seletivo_id,'nomedoprograma');

          $this->session->set_userdata( 'processo_seletivo_id'     , $this->processo_seletivo_id );
          $this->session->set_userdata( 'processo_seletivo_sigla'  , $this->processo_seletivo_sigla );
          $this->session->set_userdata( 'processo_seletivo_nome'   , $this->processo_seletivo_nome );
        }else{
          $this->crud->unset_print();
          $this->crud->unset_export();
          $this->crud->unset_delete();
          if( $this->inscricao_id ){
              $this->crud->unset_add();            
          }
        }
        
        $this->crud->where( 'id', $this->inscricao_id  );
        
        $tabela        = $this->processo_seletivo_sigla;
        $tabela_campos = 'campos';

        $this->crud->set_subject( $this->processo_seletivo_nome );
        
        $this->crud->set_table( $tabela );

        
        $this->crud->set_relation_n_n('Linhas', $tabela.'_linhas'  ,'linhadepesquisa',
                                                $tabela.'_id'      ,'linhadepesquisa_id','descricao',
                                                null, array( 'processo_seletivo_id' => $this->processo_seletivo_id));
   
     
        $this->crud->required_fields( $this->inscricao_model->getFields($this->processo_seletivo_id, 1, 0, 0  ,$tabela_campos ));
        $this->crud->columns(         $this->inscricao_model->getFields($this->processo_seletivo_id, 0, 1, 0  ,$tabela_campos ));
        $this->crud->fields(          $this->inscricao_model->getFields($this->processo_seletivo_id, 0, 0, 1 ,$tabela_campos ));
       
        $this->crud->set_rules( $this->inscricao_model->getFieldsLabelRules($this->processo_seletivo_id,"field,label,rules", 0,$tabela_campos) );
        
        $this->crud->field_type( 'candidato_id'        , 'hidden', $this->candidato_id );
        $this->crud->field_type( 'processo_seletivo_id', 'hidden', $this->processo_seletivo_id );
        $this->crud->field_type( 'dataInscricao'       , 'hidden');
        
        $this->set_rules();

        $upload = array();
        $upload = $this->inscricao_model->getFieldsLabelRules($this->processo_seletivo_id,"field,upload", 1,$tabela_campos);
        
        for($i=0;$i<count($upload);$i++){
          $this->crud->set_field_upload( $upload[$i]["field"], 'assets/uploads/files');  
        }
            
        $display = array();
        $display = $this->inscricao_model->getFieldsLabelRules($this->processo_seletivo_id,"field,label", 1,$tabela_campos);

        for($i=0;$i<count($display);$i++){
          $this->crud->display_as($display[$i]["field"],$display[$i]["label"]);  
        }
       
        $this->crud->callback_before_update(array($this,'before_insert_update'));
        $this->crud->callback_before_insert(array($this,'before_insert_update'));
        $this->crud->callback_after_insert(array($this, 'after_insert'));
        $this->crud->callback_after_update(array($this, 'after_update'));
        $this->crud->callback_after_delete(array($this, 'after_delete'));

      
        $this->crud->set_rules('candidato_id','inscricao','callback_before_insert');
        
        $data["inscricao_id"] = $this->inscricao_id;
        $this->load->vars($data);
        $this->load->vars($this->crud->render());
        $this->load->view( 'gerenciar' );
      
      } catch(Exception $e) {
          fb::info($e->getMessage().' --- '.$e->getTraceAsString());
      }     
    }

    private function set_rules(){

      $this->crud->set_rules('candidato_id','candidato','required');
      $this->crud->set_rules('processo_seletivo_id','Processo seletivo','required');
      if ( $this->crud->getState() == 'insert' || $this->crud->getState() == 'insert_validation'){
           $this->crud->set_rules('candidato_id','candidato','callback_unique_inscricao['.$this->input->post('processo_seletivo_id').']');
      }
      $this->crud->set_rules('processo_seletivo_id','Processo seletivo','callback_checar_campos['.$this->input->post('processo_seletivo_id').']');
    }

    public function unique_inscricao($pk1, $pk2) {
      $this->db->where('candidato_id', $pk1);
      $this->db->where('processo_seletivo_id', $pk2);
      if($this->db->count_all_results('inscricao') != 0) {
        $this->form_validation->set_message('unique_inscricao','Já existe uma inscrição registrada para o candidato.');
        return false;
      } else {
        return true;
      }
    }

    public function checar_campos($pk1, $pk2) {
      $this->db->where('processo_seletivo_id', $pk2);
      if( $this->db->count_all_results('campos') < 1 ) {
        $this->form_validation->set_message('checar_campos','Cadastre pelo menos um campo para este processo seletivo.');
        return false;
      } else {
        return true;
      }
    }


    public function before_insert_update($array_post) {
      
      $array_post['candidato_id'] = $this->candidato_id;
      $array_post['processo_seletivo_id'] = $this->processo_seletivo_id;
      $array_post['dataInscricao'] = date('Y-m-d H:i:s');
      return $array_post;
    }

    public function after_insert($post_array, $primary_key) {
        $this->session->set_userdata( 'inscricao_id', $primary_key );
        $this->inscricao_id = $this->session->set_userdata( 'inscricao_id', $primary_key );
        return $this->db->insert('user_logs', array('candidato_id' => $this->candidato_id,'processo_seletivo_id' => $primary_key,'action'=>'insert', 'data' => date('Y-m-d H:i:s')));
    }

    public function after_update($post_array, $primary_key) {
        $this->session->set_userdata( 'inscricao_id', $primary_key );
        $this->inscricao_id = $this->session->set_userdata( 'inscricao_id', $primary_key );
        return $this->db->insert('user_logs', array('candidato_id' => $this->candidato_id,'processo_seletivo_id' => $primary_key,'action'=>'update', 'data' => date('Y-m-d H:i:s')));
    }


    public function after_delete( $primary_key ) {
        $this->session->set_userdata( 'inscricao_id', 0 );
        $this->inscricao_id = 0;
        return $this->db->insert('user_logs', array('candidato_id' => $this->candidato_id,'processo_seletivo_id' => $primary_key,'action'=>'delete', 'data' => date('Y-m-d H:i:s')));
    }

  }

