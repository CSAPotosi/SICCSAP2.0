<?php
/* @var $this HorarioController */
/* @var $data Horario */
    $color= $data->estado=="ACTIVO"? "primary":"warning";
?>

<div class="box box-solid box-<?php echo $color; ?>">
    <div class="box-header">
        <h3 class="box-title"><?php echo CHtml::encode($data->nombre_horario); ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-<?php echo $color; ?> btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <a href="<?php echo $this->createUrl('cambiaEstado',array('id'=>$data->id_horario)); ?>"><?php echo $data->estado=='INACTIVO'? 'ACTIVAR':'INACTIVAR' ?></a>
        <b><?php echo CHtml::encode($data->getAttributeLabel('id_horario')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id_horario), array('view', 'id'=>$data->id_horario)); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_horario')); ?>:</b>
        <?php echo CHtml::encode($data->tipo_horario); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
        <?php echo CHtml::encode($data->estado); ?>
        <br />

    </div>
</div>