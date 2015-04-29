<?php
/* @var $this ServicioController */
/* @var $data Servicio */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_servicio), array('view', 'id'=>$data->id_servicio)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_serv')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_serv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_serv')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_serv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_serv')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_serv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_insti')); ?>:</b>
	<?php echo CHtml::encode($data->id_insti); ?>
	<br />

	</div>
</div>

