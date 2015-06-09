<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Erroacesso extends CI_Controller {

    function __construct() {
        parent::__construct();

    }

    function index(){

    	$data['titulo']  = 'Acesso não autorizado';
    	$data['message'] = 'Voce nao tem permissao para entrar nessa pagina ';
        $data['link']    = 'login';

		$this->load->view('cabecalho');
        $this->load->view('erroacesso_view',$data);
    }
}
