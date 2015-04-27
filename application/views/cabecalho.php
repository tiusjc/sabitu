<!DOCTYPE html>
<html>
<head>
	<title><?php echo '$titulo';?></title>
	
	<!-- jQuery -->
	<script src="<?php echo 'http://lab.unifesp.br/assets/grocery_crud/js/jquery-1.10.2.min.js'; ?>"></script>
	
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?php echo 'http://lab.unifesp.br/base_ci/assets/bootstrap/css/bootstrap.min.css';?>">	
	<!-- CSS-TEMA-UNIFESP -->
	<link rel="stylesheet" href="<?php echo 'http://lab.unifesp.br/base_ci/assets/bootstrap/css/min.css';?>">	
	<!-- CSS-uploadify -->	
	<link rel="stylesheet" href="<?php echo 'http://lab.unifesp.br/base_ci/assets/uploadify/uploadify.css';?>">	
	
	<!-- jQuery -->	
	<script src="<?php echo 'http://lab.unifesp.br/base_ci/assets/jquery-2.1.1.min.js'; ?>"  type="text/javascript"></script>
	<script src="<?php echo 'http://lab.unifesp.br/base_ci/assets/inputmask/js/jquery.inputmask.js';?>" type="text/javascript"></script>
	<script src="<?php echo 'http://lab.unifesp.br/base_ci/assets/inputmask/js/jquery.inputmask.extensions.js';?>" type="text/javascript"></script>
	<script src="<?php echo 'http://lab.unifesp.br/base_ci/assets/inputmask/js/jquery.inputmask.regex.extensions.js';?>" type="text/javascript"></script>
	<script src="<?php echo 'http://lab.unifesp.br/base_ci/assets/jquery.maskedinput.js';?>" type="text/javascript"></script>

 	<!-- PARA UPLOAD DE ARQUIVOS -->
	<!-- Generic page styles -->
	<link rel="stylesheet" href="css/style.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="css/jquery.fileupload.css">

 	<!-- FIM PARA UPLOAD DE ARQUIVOS -->

</head>
<body>
<div class="container">
	<div class="header">
		<div class="row">	
		  <div class="col-md-2"><img alt="Unifesp" src="<?php echo base_url('assets/logo.png'); ?>"></img></div>
		  <div class="col-md-8"><h2><?php echo '$titulo';?></h2><h4>Campus São José dos Campos</h4></div> 
		</div>
	  </div>	