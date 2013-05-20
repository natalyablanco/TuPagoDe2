<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
//print_r($_SERVER);
?>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p></p>

<p>Juego de Tronos - George R. R. Martin</p>
<ul>
	<li><b><i>Cancion de Hielo y Fuego 1 </i></b></li>
	
</ul>
<img src="themes/mattskitchen/img/got.jpg" alt="GOT" height="42" width="42" class="image"></img>
<br>
<div id="buyButton">
	<?php echo CHtml::linkButton('Comprar', array(
         'submit'=>array('site/compra'))); ?>
</div>
