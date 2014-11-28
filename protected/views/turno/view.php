<?php
/* @var $this TurnoController */
/* @var $model Turno */

$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	$model->id_turno,
);

$this->menu=array(
	array('label'=>'List Turno', 'url'=>array('index')),
	array('label'=>'Create Turno', 'url'=>array('create')),
	array('label'=>'Update Turno', 'url'=>array('update', 'id'=>$model->id_turno)),
	array('label'=>'Delete Turno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_turno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Turno', 'url'=>array('admin')),
);
?>

<h1>View Turno #<?php echo $model->id_turno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_turno',
		'nombre_turno',
		'tipo_turno',
		'hora_ingreso',
		'hora_salida',
		'tolerancia',
		'id_horario',
	),
)); ?>
