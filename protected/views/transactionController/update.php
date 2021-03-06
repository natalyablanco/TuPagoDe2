<?php
/* @var $this TransactionControllerController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Create Transaction', 'url'=>array('create')),
	array('label'=>'View Transaction', 'url'=>array('view', 'id'=>$model->order_id)),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);
?>

<h1>Update Transaction <?php echo $model->order_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>