<?php
/* @var $this SalaController */
/* @var $data TipoSala */
    $color=array('aqua','green','yellow','red','blue','purple','teal','maroon');
    $index_color=rand(0,7);

?>
<div class="col-md-3">
    <div class="small-box bg-<?php echo $color[$index_color]?>">
        <div class="inner">
            <h3><?php echo CHtml::encode($data->nombre_tipo_sala); ?></h3>
            <p>
                <?php echo CHtml::encode($data->descripcion_tipo_sala); ?>
                Nro de salas: <b>2</b>
            </p>
        </div>


        <?php echo CHtml::link('Ver detalle <i class="fa fa-arrow-circle-right"></i>',array('sala/view','id'=>$data->id_tipo_sala),array('class'=>'small-box-footer')) ?>
    </div>
</div>


