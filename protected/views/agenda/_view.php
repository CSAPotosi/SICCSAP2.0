<?php
/* @var $this AgendaController */
/* @var $data Cita */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_cita), array('view', 'id'=>$data->id_cita)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_cita')); ?>:</b>
	<?php echo CHtml::encode($data->hora_cita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_cita')); ?>:</b>
	<?php echo CHtml::encode($data->estado_cita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_paciente')); ?>:</b>
	<?php echo CHtml::encode($data->id_paciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medico_consulta_servicio')); ?>:</b>
	<?php echo CHtml::encode($data->medico_consulta_servicio); ?>
	<br />

	</div>
</div>

