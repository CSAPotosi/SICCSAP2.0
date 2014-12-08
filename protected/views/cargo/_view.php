<?php
/* @var $this CargoController */
/* @var $data Cargo */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_cargo), array('view', 'id'=>$data->id_cargo)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidad')); ?>:</b>
	<?php echo CHtml::encode($data->id_unidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	</div>
</div>

