
<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */



$this->breadcrumbs=array(
	'Historial Pacientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HistorialPaciente', 'url'=>array('index')),
	array('label'=>'Create HistorialPaciente', 'url'=>array('create')),
	array('label'=>'Update HistorialPaciente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HistorialPaciente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HistorialPaciente', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View HistorialPaciente #<?php echo $model->id; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ocupacion_paciente',
		'grupo_sanguineo_paciente',
		'tipo_paciente',
		'fecha_muerte',
		'fecha_creacion',
		'fecha_actualizacion',
	),
)); ?>
</div>
</div>