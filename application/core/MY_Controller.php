<<<<<<< HEAD
<?php
class MY_Controller extends CI_Controller {
	protected $crud;

function __construct($check_login = TRUE){
       parent::__construct();

      if( $check_login )
	$this->check_login();

        $this->crud  = new grocery_CRUD();

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
          $this->check_id         = $this->session->userdata('check_id'    );
      	  $this->usuarios_id      = $this->session->userdata('usuarios_id' );
          $this->email            = $this->session->userdata('email'       );
          $this->adm              = $this->session->userdata('adm'         );
          $this->form_id          = $this->session->userdata('form_id'     );
          $this->form_nome        = $this->session->userdata('form_nome'   );
          $this->form_sigla       = $this->session->userdata('form_sigla'  );
          $this->form_existe      = $this->session->userdata('form_existe' );
          $this->form_rodape      = $this->session->userdata('form_rodape' );
	  $this->form_cadastro_id = $this->session->userdata('form_cadastro_id'            );
          $this->check_id         = $this->session->userdata('check_id'                );

      		$this->usuario_id       = $this->session->userdata('usuario_id'            );
          $this->email            = $this->session->userdata('email'                   );

          $this->adm              = $this->session->userdata('adm'        );

          $this->form_id          = $this->session->userdata('form_id'    );
          $this->form_nome        = $this->session->userdata('form_nome'  );
          $this->form_sigla       = $this->session->userdata('form_sigla' );
          $this->form_existe      = $this->session->userdata('form_existe' );
          $this->form_rodape      = $this->session->userdata('form_rodape');

      		$this->form_cadastro_id = $this->session->userdata('form_cadastro_id'            );
      }
		}



	}
<<<<<<< HEAD
?>
=======
?>
=======
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
          $this->check_id         = $this->session->userdata('check_id'                );

      		$this->usuario_id       = $this->session->userdata('usuario_id'            );
          $this->email            = $this->session->userdata('email'                   );

          $this->adm              = $this->session->userdata('adm'        );

          $this->form_id          = $this->session->userdata('form_id'    );
          $this->form_nome        = $this->session->userdata('form_nome'  );
          $this->form_sigla       = $this->session->userdata('form_sigla' );
          $this->form_existe      = $this->session->userdata('form_existe' );
          $this->form_rodape      = $this->session->userdata('form_rodape');

      		$this->form_cadastro_id = $this->session->userdata('form_cadastro_id'            );
      }
		}



	}
?>
>>>>>>> a95a825cf8ba5aba53188ec5d72fd9e769dc4e79
>>>>>>> db415756a67c627fbc1259b8e7ffba3b4383c198
