
<?php
/* @var $this DiagnosticoController */
/* @var $model Diagnostico */



$this->breadcrumbs=array(
	'Diagnosticos'=>array('index'),
	$model->id_diagnostico,
);

$this->menu=array(
	array('label'=>'List Diagnostico', 'url'=>array('index')),
	array('label'=>'Create Diagnostico', 'url'=>array('create')),
	array('label'=>'Update Diagnostico', 'url'=>array('update', 'id'=>$model->id_diagnostico)),
	array('label'=>'Delete Diagnostico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_diagnostico),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Diagnostico', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Diagnostico #<?php echo $model->id_diagnostico; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_diagnostico',
		'fecha_diagnostico',
		'sintomas',
		'diagnostico',
		'tratamiento',
		'observaciones',
		'id_historia',
	),
)); ?>
</div>
</div>