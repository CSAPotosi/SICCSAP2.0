<?php
/* @var $this ServicioMedicoController */
/* @var $data CategoriaServicio */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_categoria_serv), array('view', 'id'=>$data->id_categoria_serv)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_categoria_serv')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_categoria_serv); ?>
	<br />

	</div>
</div>

