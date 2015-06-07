<?php
	class MY_Controller extends CI_Controller {
		protected $crud;
		
		function __construct($check_login = TRUE){
			parent::__construct();
			
      if( $check_login )
				$this->check_login();
      		    
      $this->crud  = new grocery_CRUD();
    	$this->crud->set_language('pt-br.portuguese');
    	$this->crud->set_theme('flexigrid');
    	$this->output->set_template('gerenciar');

      if ( !$this->adm ){
      
        if( $this->crud->getState() == 'edit' ){
          
          $id_check = $this->uri->segment(4);

          $this->check_id( $id_check );
        }
      }

		}


    private function check_id( $id_check ){
      
      if( $id_check != $this->check_id ){
        redirect(site_url($this->uri->segment(1) ) );
      }

    }
 
		private function check_login(){
			$logado = $this->session->userdata('logado');
			if (!isset($logado) || $logado != true) {
            	redirect("erroacesso");
        	}
      else{
          $this->check_id                 = $this->session->userdata('check_id'                );  
      		$this->candidato_id             = $this->session->userdata('candidato_id'            );
          $this->adm                      = $this->session->userdata('adm'                     );
      		$this->inscricao_id	            = $this->session->userdata('inscricao_id'            );
      		$this->email         	          = $this->session->userdata('email'                   );
      		$this->processo_seletivo_id	    = $this->session->userdata('processo_seletivo_id'    );
          $this->processo_seletivo_nome   = $this->session->userdata('processo_seletivo_nome'  );
      		$this->processo_seletivo_sigla  = $this->session->userdata('processo_seletivo_sigla' );
          $this->processo_seletivo_rodape = $this->session->userdata('processo_seletivo_rodape');
      }
		}


    	
	}
?>