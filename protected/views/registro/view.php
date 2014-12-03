
<?php
/* @var $this RegistroController */
/* @var $model Registro */



$this->breadcrumbs=array(
	'Registros'=>array('index'),
	$model->id_registro,
);

$this->menu=array(
	array('label'=>'List Registro', 'url'=>array('index')),
	array('label'=>'Create Registro', 'url'=>array('create')),
	array('label'=>'Update Registro', 'url'=>array('update', 'id'=>$model->id_registro)),
	array('label'=>'Delete Registro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_registro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registro', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Registro #<?php echo $model->id_registro; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_registro',
		'codigo',
		'fecha_hora_registro',
		'observaciones',
	),
)); ?>
</div>
</div>