<?php
/* @var $this PuntoconexionController */
/* @var $data Puntoconexion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrePunto')); ?>:</b>
	<?php echo CHtml::encode($data->nombrePunto); ?>
	<br />


</div>