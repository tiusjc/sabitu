<?php
class Campos_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
        
    }
    
    public function getField($id,$tabela){
     
        $this->db->where('id',$id); 
        $query = $this->db->get($tabela); 
        $row = $query->row();

        if ($query->num_rows == 1) { 
            return $row->field; 
        }else{
            return 0;
        }
    }
}