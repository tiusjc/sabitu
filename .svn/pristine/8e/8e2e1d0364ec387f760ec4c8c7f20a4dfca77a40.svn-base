<?php
class Usuario_model extends CI_Model {

    # VALIDA USUÁRIO
    function validarUsuario() {
        $this->db->where('usuario', $this->input->post('usuario')); 
        $this->db->where('senha', md5($this->input->post('senha')));
        $this->db->where('status', 1); // Verifica o status do usuário

        $query = $this->db->get('usuario'); 

        if ($query->num_rows == 1) { 
            return true; // RETORNA VERDADEIRO
        }
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logado() {
        $logado = $this->session->userdata('logado');

        if (!isset($logado) || $logado != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://www.oficinadanet.com.br/login">Efetuar Login</a>';
            die();
        }
    }
}