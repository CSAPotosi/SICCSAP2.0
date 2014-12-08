
<?php
/* @var $this CargoController */
/* @var $model Cargo */



$this->breadcrumbs=array(
	'Cargos'=>array('index'),
	$model->id_cargo,
);

$this->menu=array(
	array('label'=>'List Cargo', 'url'=>array('index')),
	array('label'=>'Create Cargo', 'url'=>array('create')),
	array('label'=>'Update Cargo', 'url'=>array('update', 'id'=>$model->id_cargo)),
	array('label'=>'Delete Cargo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cargo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cargo', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Cargo #<?php echo $model->id_cargo; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cargo',
		'nombre_cargo',
		'descripcion_cargo',
		'id_unidad',
		'estado',
	),
)); ?>
</div>
</div>