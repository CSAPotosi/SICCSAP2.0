<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->id_cuenta,
);

$this->menu=array(
	array('label'=>'List Cuenta', 'url'=>array('index')),
	array('label'=>'Create Cuenta', 'url'=>array('create')),
	array('label'=>'Update Cuenta', 'url'=>array('update', 'id'=>$model->id_cuenta)),
	array('label'=>'Delete Cuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cuenta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cuenta', 'url'=>array('admin')),
);
?>

<h1>View Cuenta #<?php echo $model->id_cuenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cuenta',
		'codigo',
		'nombre',
		'estado',
	),
)); ?>
