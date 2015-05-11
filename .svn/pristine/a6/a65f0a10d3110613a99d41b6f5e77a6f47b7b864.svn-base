<?php

class Upload extends CI_Controller {

	function index()
	{	
		
		$this->load->view('upload/upload_view', array('error' => ' ' ));
	}


	function do_upload()
	{	
		
		
		// file1		
		$path1 = './files/';		
		$config1['allowed_types'] = 'pdf';	
		//$config1['encrypt_name']  = true;
		$config1['upload_path'] = $path1;
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		
		
		//file2
		$path2 = './files/';		
		$config2['allowed_types'] = 'pdf';	
		//$config2['encrypt_name']  = true;
		$config2['upload_path'] = $path2;		
		$this->load->library('upload',$config2);
		$this->upload->initialize($config2);
		
		
		if ((!$this->upload->do_upload('anexohistorico')) || (!$this->upload->do_upload('anexocurriculo'))) {
			$error = array('error' => $this->upload->display_errors());			
			$this->load->view('cabecalho');
			$this->load->view('upload/upload_view', $error);
			$this->load->view('rodape');
			
		}
		else {
			$data = array(
			 'titulo' => 'ARQUIVOS ENVIADOS',
			 'orientador' => $this->input->post('orientador'),
			 'dedicacao' => $this->input->post('dedicacao'),
			 'anoPoscomp' => $this->input->post('anoPoscomp'),
			 'inscricaoPoscomp' => $this->input->post('inscricaoPoscomp'),
			 'notaPoscomp' => $this->input->post('notaPoscomp'),			 
			'anexohistorico' => $this->upload->data('anexohistorico'),
			'anexocurriculo' => $this->upload->data('anexocurriculo'))	
			);
			
			$this->load->view('cabecalho');
			$this->load->view('upload/upload_success', $data);
			$this->load->view('rodape');
		}
	}		
	
	private function set_upload_options() {   
	$filePath = '/var/www/inscricao/files/';		
	$config = array();
	$config['upload_path'] = $filePath;
	$config['allowed_types'] = '*';	
	$config['overwrite']     = FALSE;
	return $config;
	}

}//class
?>