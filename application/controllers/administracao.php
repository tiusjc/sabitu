<?php
  class Administracao extends MY_Controller{
    
    
    function __construct(){
      parent::__construct();
      $this->load->model('form_model');
      $this->load->model('login_model');
      
      $this->load->dbforge();
    }
    

    public function adm(){
      
      $this->crud->set_table('adm');
      $this->crud->set_subject('Cadastro de Administradores');
      
      
      $usuarios = preencher_dropdown('usuario','id','email');
      $this->crud->display_as('usuario_id','Usuário');
      $this->crud->field_type('usuario_id','dropdown',$usuarios);

      $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
         
                              // administracao/adm
                              // administracao/form
                              // administracao/linhas
                              // administracao/campos
                              // administracao/relatorios
      $dados['mnu'] = array(
        "Administradores"       => "administracao/adm",
        "Formulários"           => "administracao/form",
        "Linhas de Pesquisa"    => "administracao/linhas",
        "Campos (Formulários)"  => "administracao/campos",
        "Relatórios (Inscritos)" => "administracao/relatorios"
      );
      
      $this->load->vars($dados);
      $this->load->vars($this->crud->render());
      $this->load->view('gerenciar.php',$dados); 
    }

    public function campos(){
         
      $this->output->enable_profiler(TRUE);
 
      $this->crud->set_table('campos');
      $this->crud->order_by('form_id asc,ordem');
      $this->crud->display_as('form_id','Formulário');
      $this->crud->display_as('type','Tipo do campo');
      $this->crud->display_as('field','Nome do campo');
      $this->crud->display_as('size','Tamanho do campo');
      $this->crud->display_as('label','Exibir como');
      $this->crud->display_as('rules','Regras de validação Ex: required|md5|min(5)|max(6)');
      $this->crud->display_as('grid','Mostra na grade');
      $this->crud->display_as('add_edit','Mostra na Inclusão/Edição');
      $this->crud->display_as('upload','Campo para upload de Arquivo');

      
      $this->crud->set_subject('Cadastro de Campos');
      $this->crud->unset_export();
      $this->crud->unset_print();

      $this->crud->callback_before_insert(array($this, 'existe_field_camp'));
//      $this->set_rules();      
      $this->crud->set_relation('form_id','form','descricao');
  
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

    function existe_field_insc( $campo ){

      if (!$this->db->field_exists( $campo, 'inscricao' )){
         $this->form_validation->set_message('existe_field_insc','O campo %s ainda não existe na tabela de inscrição.');
         return false;
      }else{
         return true;
      }
      
    }

    function existe_field_camp($campo){
        if ($this->db->field_exists( $campo, 'campos' )){
           $this->form_validation->set_message('existe_field_camp','O campo %s já existe na tabela de campos.');
           return false;
        }
        else
        {
           return true;
        }
    }

    function form(){
      try{

        $this->crud->set_table('form');
        $this->crud->set_subject('Cadastro de Formulários');

        if (!$this->adm){
         $this->crud->where('usuario_id',$this->usuario_id);
        }
        
        $this->output->enable_profiler(TRUE);
        
        $this->crud->columns('descricao','sigla','data_inicio','data_fim','status','rodape');
        
        $this->crud->fields('descricao','sigla','data_inicio','data_fim','status','rodape');
      
        $this->crud->required_fields('sigla');
        
        $this->crud->callback_before_update(array($this, '_prepare_field'));
        $this->crud->callback_before_insert(array($this, '_prepare_field'));

        $this->crud->callback_after_insert(array($this, 'cria_table'));
        $this->crud->callback_after_update(array($this, 'cria_table'));
        
        $this->crud->callback_after_delete(array($this, 'dele_table'));

        
        if($this->crud->getState() == 'insert' || $this->crud->getState() == 'insert_validation')
          $this->crud->set_rules('sigla','Sigla','callback_existe_table');

        $output = $this->crud->render();
   
        $this->load->view('gerenciar.php',$output);    

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

    public function linhas(){
      
      $this->crud->set_table('linhadepesquisa');
      $this->crud->set_subject('Cadastro de Linhas de Pesquisa');
      $this->crud->display_as('descricao','Descrição');
      $this->crud->display_as('status','Estado');
      $this->crud->display_as('form_id','Formulário');
      $this->crud->set_relation('form_id','form','descricao');
    
      $output = $this->crud->render();
     
      $this->load->view('gerenciar.php',$output);       
    }
  }
?>
