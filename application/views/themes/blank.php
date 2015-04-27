<?php $controller = $this->router->fetch_class(); ?>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
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

	    <!-- BOOTSTRAP -->
		<link rel="stylesheet" href="<?php echo '../base_ci/assets/bootstrap/css/bootstrap.min.css';?>">	

		<!-- CSS-TEMA-UNIFESP -->
		<link rel="stylesheet" href="<?php echo '../base_ci/assets/bootstrap/css/min.css';?>">	
				
		<!-- jQuery -->	
		<script src="<?php echo '../base_ci/assets/jquery-2.1.1.min.js'; ?>"  type="text/javascript"></script>
		<script src="<?php echo '../base_ci/assets/inputmask/js/jquery.inputmask.js';?>" type="text/javascript"></script>
		<script src="<?php echo '../base_ci/assets/inputmask/js/jquery.inputmask.extensions.js';?>" type="text/javascript"></script>
		<script src="<?php echo '../base_ci/assets/inputmask/js/jquery.inputmask.regex.extensions.js';?>" type="text/javascript"></script>
		<script src="<?php echo '../base_ci/assets/jquery.maskedinput.js';?>" type="text/javascript"></script>

	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	</head>
  	<body>
  	    <div class="container">
  			<div class="row">
	    		<?php echo $output;?>
    		</div>
	    </div> 
	</body>
</html>
