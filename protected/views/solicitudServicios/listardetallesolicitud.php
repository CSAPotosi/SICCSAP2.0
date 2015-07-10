
<table class="table table-hover bordered" id="tabladetallesolicitud">
    <?php $listadetallesolicitud=DetalleSolicitudServicio::model()->findAll();?>
        <tr>
            <th>Paciente</th>
            <th>Servicio</th>
        </tr>
    <?php foreach($listadetallesolicitud as $lis):?>
        <?php $servicio=Servicio::model()->findByPk($lis->id_servicio)?>
        <?php $sol=SolicitudServicios::model()->findByPk($lis->id_solicitud)?>
        <?php if($lis->estado_realizado!="realizado"){?>
        <tr>
            <td>
                <?php echo $sol->idHistorial->paciente->personapa->getNombreCompleto();?>
            </td>
            <?php if($lis->autorizacion=="autorizado"){?>
                <td align="center">
                    <?php echo $servicio->nombre_serv?><br>
                    <?php echo CHtml::link('Examen',['laboratorio/createExamenLab','id_serv'=>$servicio->id_servicio,'id_historial'=>$sol->idHistorial->id_historial])?>
                    <span class="badge bg-blue">autorizado</span>
                </td>
            <?php }else{?>
                <td align="center">
                    <?php echo $servicio->nombre_serv?><br>
                    <span class="badge bg-red">no autorizado</span>
                </td>
            <?php }?>
        </tr>
        <?php }?>
    <?php endforeach?>
</table>
<?php Yii::app()->clientScript->registerScript('controlsolicitudserviciosla','
    $(document).ready(function(){
        var valor = $("#tabladetallesolicitud tr").length;
    });
');