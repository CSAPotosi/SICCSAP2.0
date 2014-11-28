<?php
/* @var $this TurnoController */
/* @var $data Turno */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_turno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_turno), array('view', 'id'=>$data->id_turno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_turno')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_turno')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->hora_ingreso); ?>
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


</div>