<?php
/* @var $this TurnoController */
/* @var $data Turno */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_turno), array('view', 'id'=>$data->id_turno)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_turno')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_turno')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_entrada')); ?>:</b>
	<?php echo CHtml::encode($data->hora_entrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_salida')); ?>:</b>
	<?php echo CHtml::encode($data->hora_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tolerancia')); ?>:</b>
	<?php echo CHtml::encode($data->tolerancia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_horario')); ?>:</b>
	<?php echo CHtml::encode($data->id_horario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>
	</div>
</div>

