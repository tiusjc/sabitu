<<<<<<< HEAD
<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function preencher_dropdown($table,$id,$campo,$sigla) {
=======
<<<<<<< HEAD
<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function preencher_dropdown($table, $id, $campo, $sigla) {
>>>>>>> db415756a67c627fbc1259b8e7ffba3b4383c198
		  $items = array();
		  $CI =& get_instance();
	      
		  
		  if(empty($sigla)){
		  	$query = $CI->db->query("SELECT $id, $campo FROM $table");
		  }else{
	      	$CI->db->order_by($campo,'ASC');
	   	    $CI->db->where("now() BETWEEN data_inicio and data_fim");
			$CI->db->where("status","1");
<<<<<<< HEAD
		  	$query = $CI->db->query("SELECT $id, $campo,sigla FROM $table");
=======
		  	$query = $CI->db->query("SELECT $id, $campo, sigla FROM $table");
>>>>>>> db415756a67c627fbc1259b8e7ffba3b4383c198
		  }
		
          $form_ativos = FALSE;

		  if ($query->num_rows() > 0) {
		  	foreach($query->result() as $data) {
		  		if( empty($sigla) ){
 				   $items[$data->$id] = $data->$campo;
		  		}else{	
			  		if( $CI->db->table_exists( $data->sigla ) ){
						$query_campo  = $CI->db->query("SELECT COUNT(*) AS qtd_campos FROM information_schema.columns WHERE table_schema ='sabitu' AND table_name='".$data->sigla."'");
	        			$campos = $query_campo->row();
						if( $campos->qtd_campos > 4 ){
			 			   $items[$data->$id] = $data->$campo;
			               $form_ativos = TRUE;
			 			}
			 		}
<<<<<<< HEAD
	 			    if(!$form_ativos){
				      $items[0] = 'Nenhum processo seletivo ativo';
				    }
		 		}
		 	}
=======
		 		}
		 	}

		    if(!$form_ativos && !empty($sigla)){ 
		      $items[0] = 'Nenhum processo seletivo ativo';
		    }
>>>>>>> db415756a67c627fbc1259b8e7ffba3b4383c198
		  }
		  $query->free_result();

		  return $items;

<<<<<<< HEAD
}
=======
}
=======
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
>>>>>>> a95a825cf8ba5aba53188ec5d72fd9e769dc4e79
>>>>>>> db415756a67c627fbc1259b8e7ffba3b4383c198
