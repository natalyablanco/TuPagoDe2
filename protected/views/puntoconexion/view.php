<?php
/* @var $this PuntoconexionController */
/* @var $model Puntoconexion */

$this->breadcrumbs=array(
	'Puntoconexions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Puntoconexion', 'url'=>array('index')),
	array('label'=>'Create Puntoconexion', 'url'=>array('create')),
	array('label'=>'Update Puntoconexion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Puntoconexion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Puntoconexion', 'url'=>array('admin')),
);
?>

<h1>View Puntoconexion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombrePunto',
	),
)); ?>
