<?php
/* @var $this HistorialPacienteController */
/* @var $data HistorialPaciente */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('ocupacion_paciente')); ?>:</b>
	<?php echo CHtml::encode($data->ocupacion_paciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo_sanguineo_paciente')); ?>:</b>
	<?php echo CHtml::encode($data->grupo_sanguineo_paciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_paciente')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_paciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_muerte')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_muerte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_actualizacion); ?>
	<br />

	</div>
</div>

