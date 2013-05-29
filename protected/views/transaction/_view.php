<?php
/* @var $this TransactionController */
/* @var $data Transaction */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_usn')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->merchant_usn), array('view', 'id'=>$data->merchant_usn)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nit')); ?>:</b>
	<?php echo CHtml::encode($data->nit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_status')); ?>:</b>
	<?php echo CHtml::encode($data->trans_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_type')); ?>:</b>
	<?php echo CHtml::encode($data->payment_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />


</div>