<?php
/* @var $this UnidadController */
/* @var $data Unidad */
$color= $data->estado=="ACTIVO"? "primary":"warning";
?>

<div class="box box-solid box-<?php echo $color;?>">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_unidad), array('view', 'id'=>$data->id_unidad)); ?>
	<br />
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-<?php echo $color;?> btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_unidad')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_unidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_unidad')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_unidad); ?>
	<br />

    <a href="<?php echo $this->createUrl("enabled",array("id"=>$data->id_unidad));?>">
        <span class="label label-<?php echo $data->estado=="ACTIVO"?"info":"warning";?>">
            <?php echo $data->estado=="ACTIVO"?"ACTIVO":"INACTIVO";?>
        </span>
    </a>
	<br />

	</div>
</div>

