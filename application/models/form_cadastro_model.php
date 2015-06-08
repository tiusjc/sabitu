<?php
class form_cadastro_model extends CI_Model {

	function getFields($id, $requerido,$grid, $add_edit,$tabela_campos)
  {

  if( $requerido ){
    $query = $this->db->query("SELECT group_concat( field ORDER BY ordem ) AS field FROM $tabela_campos WHERE form_id = $id AND locate('required',rules)>0 ");

  }else{

    if( $grid && $add_edit ){
      $query = $this->db->query("SELECT group_concat( field ORDER BY ordem ) AS field FROM $tabela_campos WHERE form_id= $id AND grid = $grid AND add_edit=$add_edit");
    }else{
      if( $grid){
          $query = $this->db->query("SELECT group_concat( field  ORDER BY ordem ) AS field FROM $tabela_campos WHERE form_id= $id AND grid = $grid");
       }else{
          $query = $this->db->query("SELECT group_concat( field ORDER BY ordem ) AS field FROM $tabela_campos WHERE form_id= $id AND add_edit = $add_edit");
       }
    }
  }

  $ret = $query->row();

  $array = explode(",",$ret->field);

  if( $add_edit ){
    array_unshift($array,"usuario_id","form_id","data_cadastro");
  }

  //array_push($array, "Disciplinas");
  return $array;

  }


  function getFieldsLabelRules($id, $select, $upload, $umparamuitos,$tabela_campos)
  {
  $this->db->where('form_id',$id);

  if( $upload ){
     $this->db->where('upload',$upload);
  }
  if( $umparamuitos ){
     $this->db->where('type','UM-PARA-MUITOS');
  }

  $this->db->select($select);

  $this->db->from($tabela_campos);

  $ret = $this->db->get();

  return $ret->result_array();

  }


  function validarForm_cadastro_id( $usuario_id, $form_id, $form_sigla ){
    $this->db->where('usuario_id' , $usuario_id         );
    $this->db->where('form_id'    , $form_id );
    $query = $this->db->get( $form_sigla );
    $row = $query->row();

    if ($query->num_rows == 1) {
        return $row->id;
    }else{
        return 0;
    }
  }
}
