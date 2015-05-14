<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Erro extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

    function index(){

    	$data['titulo']  = 'Acesso não autorizado';
    	$data['message'] = 'Voce nao tem permissao para entrar nessa pagina';
        $data['link']    = 'login/logout';
		
		$this->load->view('cabecalho');
        $this->load->view('error_view',$data);   	
    }
}