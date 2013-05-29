<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->merchant_usn=>array('view','id'=>$model->merchant_usn),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Create Transaction', 'url'=>array('create')),
	array('label'=>'View Transaction', 'url'=>array('view', 'id'=>$model->merchant_usn)),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);
?>

<h1>Update Transaction <?php echo $model->merchant_usn; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>