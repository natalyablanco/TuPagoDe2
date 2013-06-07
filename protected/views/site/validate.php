<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>



<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Juego de Tronos - George R. R. Martin</p>
<p></p>
<ul>
	<li><b><i>COMPRAR Cancion de Hielo y Fuego 1 </i></b></li>
	
</ul>
<div id="spinner"></div>
<img src="themes/mattskitchen/img/got.jpg" alt="GOT" height="42" width="42" class="image"></img>
<br>
<br>
<p><b> <?php 
     print_r($validate);
     //echo $validate;
     
?> </b></p>

    