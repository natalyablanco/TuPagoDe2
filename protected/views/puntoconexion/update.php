<?php
/* @var $this PuntoconexionController */
/* @var $model Puntoconexion */

$this->breadcrumbs=array(
	'Puntoconexions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Puntoconexion', 'url'=>array('index')),
	array('label'=>'Create Puntoconexion', 'url'=>array('create')),
	array('label'=>'View Puntoconexion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Puntoconexion', 'url'=>array('admin')),
);
?>

<h1>Update Puntoconexion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>