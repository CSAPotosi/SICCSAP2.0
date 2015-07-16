<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4>Detalle de solicitud de Internacion</h4>
        </div>
        <div class="box-body">
            <?php $detalles=DetalleSolicitudServicio::model()->findAll(array(
                'condition'=>"id_solicitud ='{$solicitud->id_solicitud}'",
            ));?>
            <table class="table table-condensed">
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Realizado</th>
                    <th>Autorizacion</th>
                </tr>
                <?php foreach($detalles as $sol):?>
                    <?php $servicio=Servicio::model()->findByPk($sol->id_servicio)?>
                    <tr>
                        <td><?php echo $servicio->nombre_serv?></td>
                        <td><?php echo $sol->cantidad?></td>
                        <td><?php echo $sol->estado_realizado?></td>
                        <td><?php echo $sol->autorizacion?></td>
                    </tr>
                <?php endforeach?>
            </table>
            <?php
            $examenlab=array();
            $examengab=array();
            ?>
            <?php foreach($detalles as $det):
                $servicio=Servicio::model()->findByPk($det->id_servicio);
                if($servicio->examenLaboratorio!=null){
                    $examenlab[]=$servicio->examenLaboratorio;
                }
                if($servicio->examenGabinete!=null){
                    $examengab[]=$servicio->examenGabinete;
                }
            endforeach?>
            <?php if($examenlab!=null){?>
                <?php echo CHtml::link("<i class='fa fa-fw fa-file-text'></i>GENERAR ORDEN DE LABORATORIO",array('SolicitudServicios/reporteOrdenlab','id'=>$solicitud->id_solicitud),array('class'=>'btn btn-social bg-blue', 'target'=>'_blank'))?>
            <?php }?>
            <?php foreach($examengab as $ex):?>
                <?php echo CHtml::link("<i class='fa fa-fw fa-file-text'></i>GENERAR ORDEN DE&nbsp;&nbsp;&nbsp;".strtoupper($ex->Serviciogab->examenGabinete->idCatGab->nombre_cat_gab)."",array('SolicitudServicios/reporteOrdengab','id'=>$solicitud->id_solicitud,'ser'=>$ex->Serviciogab->id_servicio),array('class'=>'btn btn-social bg-blue', 'target'=>'_blank'))?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box box-primary">

    </div>
</div>