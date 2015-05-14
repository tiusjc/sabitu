<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <div>
      <!-- <div class="panel panel-info" > -->

      <div style="padding-top:30px" class="panel-body" >
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
        </div>
        <?php
        echo form_open('');
	  
        //email 
        $email = array(
                          'name'        => 'email',
                          'id'          => 'email',
                          'value'       => '',
                          'maxlength'   => '',
                          'size'        => '',
                          'placeholder' => 'seu email',
                          'class'       => 'form-control'
        );
        //echo form_label('Email', 'email');
        echo '<div class="row">';

		    echo '<div class="col-md-8 col-lg-offset-2">';
        echo '<div style="margin-bottom: 15px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>';                
		    echo form_input($email);
        echo '</div>';
        echo '</div>';

        $senha = array(
                          'name'        => 'senha',
                          'id'          => 'senha',
                          'value'       => '',
                          'maxlength'   => '',
                          'size'        => '',
                          'placeholder' => 'senha',
                          'class'       => 'form-control'
        );
                
        //echo form_label('Senha', 'senha');
        echo '<div class="col-md-8 col-lg-offset-2">';
        echo '<div style="margin-bottom: 15px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>';
        echo form_password($senha);
        echo '</div>';
        echo '</div>';
                                
        //echo form_label('Senha', 'senha');
        echo '<div class="col-md-8 col-lg-offset-2">';
        echo '<div style="margin-bottom: 15px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>';
       echo form_dropdown('form_id', $form,null,'id="form_id" class="form-control"'); 
        echo '</div>';
        echo '</div>';


        echo '<input id="form_nome" type="hidden" name="form_nome" value="">';
                  
        //botões
        echo '<div class="col-md-8 col-lg-offset-2" style="margin-bottom: 15px">';
        $submit = array(
                           'class'   => 'btn btn-success',
                           'content' => 'Login',
                           'type'    => 'submit'
        );
        echo form_button($submit);
                
        echo " ";
		
        $novaconta = array(
                'class'   => 'btn btn-primary',
                'title'   => 'Registrar candidato',
        );              
        echo anchor('registro', 'Registrar',  $novaconta );
        echo "</div>";
        echo validation_errors('<div class="error">', '</div>');
               
        form_close(); 
        
	      echo '</div>';
                
        ?>

        <?php if(isset($erro)) { ?>
            <div class="alert alert-error"><?php echo $erro; ?>
            </div>
        <?php } ?>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
