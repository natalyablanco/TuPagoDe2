<?php
/* @var $this PuntoconexionController */
/* @var $model Puntoconexion */

$this->breadcrumbs=array(
	'Puntoconexions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Puntoconexion', 'url'=>array('index')),
	array('label'=>'Manage Puntoconexion', 'url'=>array('admin')),
);
?>

<h1>Create Puntoconexion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>