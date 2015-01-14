<?php
/* @var $this DiagnosticoController */
/* @var $data Diagnostico */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_diagnostico), array('view', 'id'=>$data->id_diagnostico)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_diagnostico')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_diagnostico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sintomas')); ?>:</b>
	<?php echo CHtml::encode($data->sintomas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diagnostico')); ?>:</b>
	<?php echo CHtml::encode($data->diagnostico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tratamiento')); ?>:</b>
	<?php echo CHtml::encode($data->tratamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_historia')); ?>:</b>
	<?php echo CHtml::encode($data->id_historia); ?>
	<br />

	</div>
</div>

