<?php
class Login_model extends CI_Model {

    function logado(){
        $logado = $this->session->userdata('logado');
        if (!isset($logado) || $logado != true) {
            redirect("erroacesso");
        }
    }

}