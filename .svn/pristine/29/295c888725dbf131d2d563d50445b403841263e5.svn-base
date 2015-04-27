<?php
class Registro_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        
    }

	function salvar($data){
		if($this->db->insert('usuarios', $data)){
			return TRUE;
		}
		return FALSE;
	}
}