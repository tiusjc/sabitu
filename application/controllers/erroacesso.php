<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Erroacesso extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->_init();

    }


      private function _init()
    {
       // $this->output->set_common_meta('Inscrição Programa de Mestrado em Ciência da Computação-UNIFESP-SJC',
                                  //      'Processo Seletivo','Processo seletivo');
        $this->output->set_template('blank');

    }

    function index(){

    	$data['titulo']  = 'Acesso não autorizado';
    	$data['message'] = 'Voce nao tem permissao para entrar nessa pagina ';
        $data['link']    = 'login';

	//	$this->load->view('cabecalho');
        $this->load->view('erroacesso_view',$data);
    }
}
