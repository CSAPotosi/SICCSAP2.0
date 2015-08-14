<?php
    $this->pageTitle='Servicios solicitados';
?>



<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Examenes solicitados
                </h3>
            </div>
            <div class="box-body">

                <table class="table table-hover bordered" id="tabladetallesolicitud">
                    <?php $listadetallesolicitud=DetalleSolicitudServicio::model()->findAll();?>
                    <tr>
                        <th>Paciente</th>
                        <th>Servicio</th>
                        <th>Estado</th>
                        <th>Autorizacion</th>
                        <th>

                        </th>
                    </tr>
                    <?php foreach($listadetallesolicitud as $lis):?>
                        <?php $servicio=Servicio::model()->findByPk($lis->id_servicio)?>
                        <?php if($servicio->examenLaboratorio!=null):?>
                        <?php $sol=SolicitudServicios::model()->findByPk($lis->id_solicitud)?>
                        <tr>
                            <td><?php echo $sol->idHistorial->paciente->personapa->getNombreCompleto();?></td>
                            <td><?php echo $servicio->nombre_serv?></td>
                            <?php if($lis->estado_realizado=="REALIZADO"){?>
                                <td><span class="badge bg-blue">realizado</span></td>
                            <?php }else{?>
                                <td><span class="badge bg-red">no realizado</span></td>
                            <?php }?>
                            <?php if($lis->autorizacion=="autorizado"){?>
                                <td><span class="badge bg-blue">autorizado</span></td>
                            <?php }else{?>
                                <td><span class="badge bg-red">no autorizado</span></td>
                            <?php }?>
                            <td><?php
                                echo CHtml::link('Ver estado',['laboratorio/verEstadoExamen','id_det'=>$lis->id_detalle_servicio],['class'=>'btn btn-primary btn-sm']);?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
