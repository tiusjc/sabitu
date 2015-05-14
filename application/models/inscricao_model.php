<?php
class form_cadastro_model extends CI_Model {
	
	function getFields($id, $requerido,$grid, $add_edit,$tabela_campos)
  {
  
  $this->db->where('processo_seletivo_id',$id);

  
  if( $requerido ){
    $this->db->select("group_concat(field ORDER BY ordem) AS field FROM  ".$tabela_campos);
    $this->db->where("locate('required',rules)>0");

  }else{
     $this->db->select("group_concat(field ORDER BY ordem) AS field FROM ".$tabela_campos);
  }

  if( $grid ){
     $this->db->where('grid',$grid);
  }

  if( $add_edit ){
     $this->db->where('add_edit',$add_edit);
  } 


  $ret = $this->db->get()->row();
  
  $array = explode(",",$ret->field);
  
  if( $add_edit ){
    array_unshift($array,"candidato_id","processo_seletivo_id");
  }
  
  array_push($array,"Linhas");
  return $array;
        
  }


  function getFieldsLabelRules($id, $select, $upload,$tabela_campos)
  {
  $this->db->where('processo_seletivo_id',$id);

  if(!empty($upload) && $upload ){
     $this->db->where('upload',$upload);
  }
  
  $this->db->select($select);

  $this->db->from($tabela_campos);
  
  $ret = $this->db->get();
  
  return $ret->result_array();
        
  }


  function validate_inscricao_id($candidato_id, $processo_seletivo_id, $processo_seletivo_sigla){
        $this->db->where('candidato_id'        , $candidato_id         ); 
        $this->db->where('processo_seletivo_id', $processo_seletivo_id );

        $query = $this->db->get($processo_seletivo_sigla); 
        $row = $query->row();

        if ($query->num_rows == 1) { 
            return $row->id; 
        }else{
            return 0;
        }
  }
}