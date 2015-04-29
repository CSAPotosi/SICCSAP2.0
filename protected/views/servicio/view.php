
<?php
/* @var $this ServicioController */
/* @var $model Servicio */



$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->id_servicio,
);

$this->menu=array(
	array('label'=>'List Servicio', 'url'=>array('index')),
	array('label'=>'Create Servicio', 'url'=>array('create')),
	array('label'=>'Update Servicio', 'url'=>array('update', 'id'=>$model->id_servicio)),
	array('label'=>'Delete Servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_servicio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servicio', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Servicio #<?php echo $model->id_servicio; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_servicio',
		'codigo_serv',
		'nombre_serv',
		'unidad_serv',
		'fecha_creacion',
		'fecha_actualizacion',
		'id_insti',
	),
)); ?>
</div>
</div>