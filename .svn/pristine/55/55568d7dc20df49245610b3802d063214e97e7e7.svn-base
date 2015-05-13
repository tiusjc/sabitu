<?php $controller = $this->router->fetch_class(); ?>
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

		foreach($css_files as $file){
		 	echo "\n\t\t";
			?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
		} echo "\n\t";

		foreach($js_files as $file){
				echo "\n\t\t";
				?><script src="<?php echo $file; ?>"></script><?php
		} echo "\n\t";
		?>
		
		<!-- jQuery -->
		
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css';?>">

	 	<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
	 	<script src="<?php echo base_url().'assets/myjs.js'; ?>"></script>
	 	
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
			  					<img alt="Unifesp" src="<?php echo base_url('assets/logo.png'); ?>" />
			  					<h6 style="margin-left:10px">Usuário: <?php echo $this->email;?></h6>
			  				</div> 
				          	<div class="col-md-8">
				          		<h3><?php echo 'Inscrição '.$this->processo_seletivo_nome;?></h3>
				          		<h4>Processo Seletivo</h4>
				          		<h4>Campus São José dos Campos</h4>
				          	</div>
	        			</div>

			   		</div> 
	  	    		<div><?php echo $this->session->flashdata("mensagem");?></div>
	  	    		<div class="navbar">			
						<ul  class="nav nav-tabs">								
							<li <?php if($controller == 'candidato') { echo ' class="active"';}?>><a href="<?php echo site_url('candidato');?>">Dados do Candidato</a> </li>
							<!--'.$mnu_can.'"-->
							<li <?php if($controller == 'inscricao') { echo ' class="active"';}?>><a href="<?php echo site_url('inscricao');?>">Formulário de Inscrição</a> </li>			  														
                            
                            <?php if($this->adm){
                            	$this->load->view('adm_view');
                        	}?>
					
							<li> <a href="<?php echo site_url('login/logout');?>">Sair</a> </li>
						</ul>
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
    		<div class="row">
    			<div class="panel-body">
					<div class="alert alert-info" role="alert">
						<?php echo $this->processo_seletivo_rodape;?>
					</div>
				</div>
   			</div> 
	    </div> 
	</body>
</html>