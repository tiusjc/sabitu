<?php
class form_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
        
    }
    
    public function getField($id,$campo){
        $this->db->select("$campo");
        $this->db->where('id',$id);
        $busca = $this->db->get('form');
        if ($busca ->num_rows > 0){
            $row = $busca->row_array();
            return $row[$campo];
        }else{
            return "";
        }
    }

    public function getForm_existe( $sigla ){
        if( $this->db->table_exists( $sigla ) ){
            return true;    
 
          }else{

            return false;
          }
    }
}