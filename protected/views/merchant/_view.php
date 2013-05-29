<?php
/* @var $this MerchantController */
/* @var $data Merchant */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->merchant_id), array('view', 'id'=>$data->merchant_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>