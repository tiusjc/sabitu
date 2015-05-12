<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function preencher_dropdown($table, $id, $campo, $sigla) {
		  $items = array();
		  $CI =& get_instance();


		  if(empty($sigla)){
		  	$query = $CI->db->query("SELECT $id, $campo FROM $table");
		  }else{
	      	$CI->db->order_by($campo,'ASC');
	   	    $CI->db->where("now() BETWEEN data_inicio and data_fim");
			$CI->db->where("status","1");
		  	$query = $CI->db->query("SELECT $id, $campo, sigla FROM $table");
		  }

          $form_ativos = FALSE;

		  if ($query->num_rows() > 0) {
		  	foreach($query->result() as $data) {
		  		if( empty($sigla) ){
 				   $items[$data->$id] = $data->$campo;
		  		}else{
			  		if( $CI->db->table_exists( $data->sigla ) ){
						$query_campo  = $CI->db->query("SELECT COUNT(*) AS qtd_campos FROM information_schema.columns WHERE table_schema ='web_sabitu' AND table_name='".$data->sigla."'");
	        			$campos = $query_campo->row();
						if( $campos->qtd_campos > 4 ){
			 			   $items[$data->$id] = $data->$campo;
			               $form_ativos = TRUE;
			 			}
			 		}
		 		}
		 	}

		    if(!$form_ativos && !empty($sigla)){
		      $items[0] = 'Nenhum processo seletivo ativo';
		    }
		  }
		  $query->free_result();

		  return $items;

}
