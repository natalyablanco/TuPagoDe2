<?php
/* @var $this PuntoconexionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Puntoconexions',
);

$this->menu=array(
	array('label'=>'Create Puntoconexion', 'url'=>array('create')),
	array('label'=>'Manage Puntoconexion', 'url'=>array('admin')),
);
?>

<h1>Puntoconexions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
