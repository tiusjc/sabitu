<h3><?php echo $titulo;?></h3>

<ul>
  <?php 
    echo $orientador. '<br/>'; 
    echo $dedicacao.'<br/>';
    echo $anoPoscomp.'<br/>'; 
    echo $inscricaoPoscomp.'<br/>'; 
    echo $notaPoscomp.'<br/>'; 
    echo $anexohistorico[0]['full_path'].'<br/>'; 
    echo $anexocurriculo[0]['full_path'].'<br/>';
    
  ?>

  <br/>
  
  <?php foreach($anexohistorico as $item1){?>
  
  <li><? echo $item1['file_name']; ?></li>
  <li><? echo $item1['full_path']; ?></li>
  
  <?php } ?>
</ul>

<br/>

<ul>
  <?php foreach($anexocurriculo as $item2){?>
  
  <li><? echo $item2['file_name']; ?></li>
  <li><? echo $item2['full_path']; ?></li>
  <?php } ?>
</ul>


<?php print_r($anexohistorico);?>
<br/>
<?php print_r($anexocurriculo);?>
<br/>

<p><?=anchor('upload', 'Deseja enviar outro?'); ?></p>

