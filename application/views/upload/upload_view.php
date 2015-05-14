<?php if($error) : ?>
<div class="alert alert-danger">
    <p><?php echo $error;?></p>
</div>
<?php endif ;?>

<div class="container">

<?php 
    echo form_open_multipart('upload/do_upload', 'class="form-group", role="form"');
	
      echo form_label('Orientador', 'orientador');
      echo form_input(array("id" =>"orientador", "name"=>"orientador","value"=>set_value("orientador",""), "class"=>"form-control"));
	

      echo form_label("Dedicação","dedicacao");
      $arrayDedicacao =  array('1' => 'Integral', '2' => 'Parcial');
      echo form_dropdown('dedicacao', $arrayDedicacao, 'default','class="form-control"');
      echo form_error("dedicacao");
    
      echo form_label('Orientador', 'orientador');
      echo form_input(array("id" =>"orientador", "name"=>"orientador","value"=>set_value("orientador",""), "class"=>"form-control"));
      echo form_error("orientador");
	
      echo form_label('Ano de realização', 'anoPoscomp');
      echo form_input(array("id" =>"anoPoscomp", "name"=>"anoPoscomp","value"=>set_value("anoPoscomp",""), "class"=>"form-control"));
      echo form_error("anoPoscomp");

      echo form_label('Nº de inscrição do PosComp', 'inscricaoPoscomp');
      echo form_input(array("id" =>"inscricaoPoscomp", "name"=>"inscricaoPoscomp","value"=>set_value("inscricaoPoscomp",""),"class"=>"form-control"));
      echo form_error("inscricaoPoscomp");
      
      echo form_label('Nota do PosComp', 'notaPoscomp');
      echo form_input(array("id" =>"notaPoscomp", "name"=>"notaPoscomp","value"=>set_value("notaPoscomp",""),"class"=>"form-control"));
      echo form_error("notaPoscomp");
	  
      $dataInscricao = date("Y-m-d H:i:s");
      echo form_hidden('dataInscricao', $dataInscricao);
      
      
	    echo '<br/><div class="form-group">';
	    echo form_open_multipart("upload/do_upload");
	
	    echo form_label('Anexar Histórico', 'anexohistorico'); 	
 	    echo '<input type="file" name="anexohistorico" id="anexohistorico" size="20"/>';
 	    echo form_error("anexohistorico");
	    echo "<br />";
			

	    echo form_label('Anexar Currículo', 'anexocurriculo');
	    echo '<input type="file" name="anexocurriculo" id="anexocurriculo" sice="20"/>';
	    echo form_error("anexocurriculo");
	    echo "</div><br />";
           
      echo form_button(array("class"=>"btn btn-primary","content" => "Cadastrar","type" => "submit"));
        
    echo form_close();
?>
</div>