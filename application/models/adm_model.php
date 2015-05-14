<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }

    function validate_adm( $id ) {
        $this->db->where('usuarios_id', $id ); 

        $query = $this->db->get('adm'); 
        $row = $query->row();

        if ($query->num_rows == 1) { 
            return 1;
        }else{
            return 0;
        }
    }
}