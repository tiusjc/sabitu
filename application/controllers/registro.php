<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('registro_model');
        $this->_init();
    }

        private function _init()
        {

        	$this->output->set_template('registro');

        }

    public function index(){
    	$this->load->view('registro_view');
    }

	public function incluir(){
		$this->form_validation->set_rules('email', 'Email','xss_clean|required|valid_email|callback_email_existe');
		$this->form_validation->set_rules('senha', 'Senha','xss_clean|required|min_length[4]|max_length[12]|matches[senha2]|md5');
		$this->form_validation->set_rules('senha2','Confirmar senha','xss_clean|required|matches[senha]|md5');
		if($this->form_validation->run() == FALSE){
			$this->load->view('registro_view');
		}
		else{

			$emailto  = $this->input->post('email');
			$senha    = $this->input->post('senha');
			$mensagem1 = "Você pode logar agora ";
			$mensagem2 = "Um email foi enviado para <b>$emailto</b>.Você pode logar agora ";

			$data['email'] = $emailto;
			$data['senha'] = $senha;

			if($this->registro_model->salvar($data) === TRUE){

				$data['titulo']  = 'Registro de usuário realizado com sucesso!';
				$data['message'] = $mensagem1;
				$data['link']    = base_url().'login';

				$sucesso_email = $this->load->view('sucesso_view', $data, TRUE);

				$config = array(
					'protocol'     => 'smtp',
			    	'smtp_host'    => 'ssl://smtp.gmail.com',
			    	'smtp_port'    =>  465,
			    	'smtp_timeout' =>  7,
			    	'smtp_user'    => 'tiusjc@gmail.com',
			    	'smtp_pass'    => '#ana#dan#fra#thi#wal',
			       	'charset'      => 'utf-8',
			       	'mailtype'     => 'html'
			    );

				$this->load->library('email');
				$this->email->initialize( $config);

				$this->email->from('tiusjc@gmail.com', 'TISJC');
				$this->email->to( $emailto );
				$this->email->subject('Registro realizado com sucesso');
				$this->email->message($sucesso_email);
				$this->email->send();

			    $data['titulo']  = 'Registro de usuário';
				$data['message'] = $mensagem2;
				$data['link']    = '/sabitu/login';

				$this->load->view('sucesso_view', $data);
			}
			else{
				$data['error'] = "Ocorreu algum erro ao adicionar o seu registro no banco de dados";
				$this->load->view('error_view', $data);
			}
		}
	}

	function email_existe($email){
		$query = $this->db->get_where('usuarios', array('email' => $email));
		if($query->num_rows() > 0){
			$this->form_validation->set_message('email_existe', 'O %s já existe no sistema, por favor verifique !');
			return FALSE;
		}
		$query->free_result();
		return TRUE;
	}
}
