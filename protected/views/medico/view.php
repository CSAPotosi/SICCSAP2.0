
<?php
/* @var $this MedicoController */
/* @var $model Medico */



$this->breadcrumbs=array(
	'Medicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Medico', 'url'=>array('index')),
	array('label'=>'Create Medico', 'url'=>array('create')),
	array('label'=>'Update Medico', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Medico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Medico', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Medico #<?php echo $model->id; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'matricula',
		'colegiatura',
		'estado',
	),
)); ?>
</div>
</div>