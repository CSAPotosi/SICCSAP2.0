
<?php
/* @var $this EspecialidadController */
/* @var $model Especialidad */



$this->breadcrumbs=array(
	'Especialidads'=>array('index'),
	$model->id_especialidad,
);

$this->menu=array(
	array('label'=>'List Especialidad', 'url'=>array('index')),
	array('label'=>'Create Especialidad', 'url'=>array('create')),
	array('label'=>'Update Especialidad', 'url'=>array('update', 'id'=>$model->id_especialidad)),
	array('label'=>'Delete Especialidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_especialidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Especialidad', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Especialidad #<?php echo $model->id_especialidad; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_especialidad',
		'nombre_especialidad',
		'descripcion',
	),
)); ?>
</div>
</div>