<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

//print_r($_SERVER);
?>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<h3>
	<?php 
		$validate = "";
		echo CHtml::linkButton('Iniciar Compra', array(
         'submit'=>array('site/compra')));
    ?>
</h3>