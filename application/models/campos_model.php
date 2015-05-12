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
    
    public function getCountField($form_id,$campo_type = 'UM-PARA-MUITOS'){
        $this->db->where('form_id',$form_id); 
        $this->db->where('type',$campo_type); 
        
        $query = $this->db->get("campos"); 
        return $query->num_rows;
    }
    
    
}