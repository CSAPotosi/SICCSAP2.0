
<?php
/* @var $this SolicitudServiciosController */
/* @var $model SolicitudServicios */



$this->breadcrumbs=array(
	'Solicitud Servicioses'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'List SolicitudServicios', 'url'=>array('index')),
	array('label'=>'Create SolicitudServicios', 'url'=>array('create')),
	array('label'=>'Update SolicitudServicios', 'url'=>array('update', 'id'=>$model->id_solicitud)),
	array('label'=>'Delete SolicitudServicios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SolicitudServicios', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View SolicitudServicios #<?php echo $model->id_solicitud; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_solicitud',
		'id_historial',
		'fecha_solicitud',
		'estado_dinero',
		'estado_permiso',
		'total',
	),
)); ?>
</div>
</div>