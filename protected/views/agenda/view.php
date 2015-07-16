
<?php
/* @var $this AgendaController */
/* @var $model Cita */



$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->id_cita,
);

$this->menu=array(
	array('label'=>'List Cita', 'url'=>array('index')),
	array('label'=>'Create Cita', 'url'=>array('create')),
	array('label'=>'Update Cita', 'url'=>array('update', 'id'=>$model->id_cita)),
	array('label'=>'Delete Cita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cita),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cita', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Cita #<?php echo $model->id_cita; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cita',
		'fecha',
		'hora_cita',
		'estado_cita',
		'id_paciente',
		'medico_consulta_servicio',
	),
)); ?>
</div>
</div>