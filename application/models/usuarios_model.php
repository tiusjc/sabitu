<?php
class usuarios_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        
    }

    function validarUsuario_id() {
        $this->db->where('email',     $this->input->post('email')  ); 
        $this->db->where('senha', md5($this->input->post('senha')) );

        $query = $this->db->get('usuarios'); 
        $row = $query->row();

        if ($query->num_rows == 1) { 
            return $row->id; 
        }else{
            return 0;
        }
    }
    

	public function validarUsuario_nome( $usuario_id ){    
	    $this->db->where('id', $usuario_id);
	    $this->db->select('nome');		    
	    $busca = $this->db->get('usuarios');
	    $row   = $busca->row();
	    if(empty( $row->nome )){
	        $this->session->set_flashdata('mensagem',
	        	'<div class="alert alert-danger">Por favor, primeiro atualize seus dados</div>');
	      	return false;
	    }else{
            return true; 
	    }
	}
}