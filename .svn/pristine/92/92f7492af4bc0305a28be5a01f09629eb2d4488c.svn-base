<?php
	 foreach($js as $file){
			echo "\n\t\t"; 
			?><script src="<?php echo $file; ?>"></script><?php
	 } echo "\n\t"; 
?>	
<?php
		
	 foreach($css as $file){ 
	 	echo "\n\t\t"; 
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	 } echo "\n\t"; 
?>
<?php
	if(!empty($meta)) 
		foreach($meta as $name=>$content){
			echo "\n\t\t"; 
			?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
	 }
	?>

<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>

  <div class="navbar">			
		<ul  class="nav nav-tabs">								
			<li<?php if($controller == 'candidato') echo ' class="active"'; ?>><a href="<?php echo site_url('gerenciar/candidato'); ?>">Dados do Candidato</a></li>
			<li<?php if($controller == 'inscricao') echo ' class="active"'; ?>><a href="<?php echo site_url('gerenciar/inscricao'); ?>">Formulário de Inscrição</a></li>			  														
			<li><a href="<?php echo site_url('login/logout'); ?>">Sair</a></li>
		</ul>
  </div>
  
