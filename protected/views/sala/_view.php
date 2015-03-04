<?php
/* @var $this SalaController */
/* @var $data TipoSala */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_tipo_sala), array('view', 'id'=>$data->id_tipo_sala)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tipo_sala')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_tipo_sala); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_tipo_sala')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_tipo_sala); ?>
	<br />

	</div>
</div>

