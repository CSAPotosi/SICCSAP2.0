<?php
    $this->pageTitle='Estado de examen'
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modeloDetalle->idSolicitud->idHistorial));?>


<div class="box box-solid box-primary">
    <div class="box-header">
        <h3 class="box-title">
            Datos de servicio
        </h3>
    </div>
    <div class="box-body">
        <dl class="dl-horizontal">
            <dt>SERVICIO</dt>
            <dd><?php  echo $modeloDetalle->servicio->nombre_serv;?></dd>
            <dt>ESTADO</dt>
            <dd>
                <?php echo $modeloDetalle->estado_realizado;
                    if($modeloDetalle->estado_realizado=='no realizado')
                        echo CHtml::link('Realizar',['laboratorio/realizarExamen','id_det'=>$modeloDetalle->id_detalle_servicio],['class'=>'btn-primary btn-xs btn']);
                ?>
            </dd>
        </dl>
    </div>
</div>

<?php if($modeloDetalle->servicio->parametrosLaboratorio):?>

<div class="box box-solid box-primary">
    <div class="box-header">
        <h3 class="box-title">
            Resultado del examen
        </h3>
        <?php if($modeloDetalle->resultadoLab!=null): ?>
            <div class="box-tools">
                <?php echo CHtml::link('<i class="fa fa-print"></i>',['reportes/reporteResultadoLaboratorio','id_det'=>$modeloDetalle->id_detalle_servicio],['class'=>'btn btn-primary btn-xs','target'=>'_blanck']);?>
            </div>
        <?php endif;?>
    </div>
    <div class="box-body">
        <?php
        if($modeloDetalle->resultadoLab!=null)
            $this->renderPartial('_detalleExamenLaboratorio',['modeloDetalle'=>$modeloDetalle]);
        else
            $this->renderPartial('_formExamenLaboratorio',['modelResultado'=>$modelResultado, 'listaParRes'=>$listaParRes]);
        ?>
    </div>
</div>

<?php endif;?>