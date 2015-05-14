<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- GROCERY CRUD -->
		<?php

		if(!empty($meta))
		foreach($meta as $name=>$content){
			echo "\n\t\t";
			?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
				 }
		echo "\n";

		if(!empty($canonical))
		{
			echo "\n\t\t";
			?><link rel="canonical" href="<?php echo $canonical?>" /><?php

		}
		echo "\n\t";

		foreach($css as $file){
		 	echo "\n\t\t";
			?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
		} echo "\n\t";

		foreach($js as $file){
				echo "\n\t\t";
				?><script src="<?php echo $file; ?>"></script><?php
		} echo "\n\t";
		?>
		
		<!-- jQuery -->
		
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css';?>">

	 	<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
	 	<script src="<?php echo base_url().'assets/myjs.js'; ?>"></script>
	 	<script src="<?php echo base_url().'assets/SpryAssets/SpryValidationTextField.js'; ?>"></script>

		<!-- CSS-TEMA-UNIFESP -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/min.css';?>">	
	
	    <!-- jQuery -->	
		<script src="<?php echo base_url().'assets/inputmask/js/jquery.inputmask.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'assets/inputmask/js/jquery.inputmask.extensions.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'assets/inputmask/js/jquery.inputmask.regex.extensions.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'assets/jquery.maskedinput.js';?>" type="text/javascript"></script>

	 	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

  	<body>
  	    <div class="container">

  	    	<!--  CABEÇALHO E MENU -->
  	        <div class="row">
				<div class="panel-body">	        
	  	    		<div class="header">
	        			<div class="row">
	        				<div class="col-md-3">
			  					<img alt="Unifesp" src="<?php echo base_url('assets/logo.png'); ?>"></img>
			  				</div> 
				          	<div class="col-md-8">
				          		<h3><?php echo "Registrar novo usuário";?></h1>
				          		<h4>Processo Seletivo</h4>
				          		<h4>Campus São José dos Campos</h4>
				          	</div>
	        			</div>
			   		</div> 
	  			</div>
			</div>

			<!-- CONTEÚDO -->
    		<div class="row">
    			<div class="panel-body">	   
	    			<?php echo $output;?>
	    		</div>	
    		</div>

    		<!-- RODAPÉ -->
    		<div class="header">     
				<div class="panel-body">
					<p>E-mail: Digite um email válido <br> Senha: Digite uma senha de pelo menos 4 digítos <br> Um e-mail de confirmação será enviado!</p>
				</div>
   			</div> 

	    </div> 
	</body>
</html>
