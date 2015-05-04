
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="bs-example bs-login">
            <?php
                echo validation_errors(); 
                echo form_open('registro/incluir/');

                $email = array(
                          'name'        => 'email',
                          'id'          => 'email',
                          'value'       => '',
                          'maxlength'   => '',
                          'size'        => '',
                          'placeholder' => 'e-mail',
                          'class'       => 'form-control',
                        );
                echo form_label('E-mail', 'email');
                echo '<div style="margin-bottom: 15px" class="input-group">';
                echo '<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>';
                echo form_input($email);
                echo '</div>';

                $senha = array(
                          'name'        => 'senha',
                          'id'          => 'senha',
                          'value'       => '',
                          'maxlength'   => '',
                          'size'        => '',
                          'placeholder' => '1234',
                          'class'       => 'form-control',
                          
                        
                        );
                
                echo form_label('Senha', 'senha');
                echo '<div style="margin-bottom: 15px" class="input-group">';
                echo '<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>';
                echo form_password($senha);
                echo '</div>';

                $senha2 = array(
                          'name'        => 'senha2',
                          'id'          => 'senha2',
                          'value'       => '',
                          'maxlength'   => '',
                          'size'        => '',
                          'placeholder' => '1234',
                          'class'       => 'form-control',
                        );
                
                echo form_label('Confirmar senha', 'senha2');
                echo '<div style="margin-bottom: 15px" class="input-group">';
                echo '<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>';
                echo form_password($senha2);
                echo '</div>';

                echo "<p>";
                echo "<p align='center'>";
               
                $submit = array(
                'class'   => 'btn btn-primary',
                'content' =>       'Registrar',
                'type'    => 'submit'
                );
                echo form_button($submit);
                
                echo " ";

                $voltar = array(
                'class'   => 'btn btn-primary',
                'title'   => 'Voltar',
                );              
                echo anchor('login', '     Voltar    ',$voltar );

                echo "</p>";
               
                form_close(); 
            ?>
        </div>
    </div>
</div>
