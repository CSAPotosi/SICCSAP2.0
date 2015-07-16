<div class="row">
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4>Ordenes de servicios en Internacion</h4>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                <h3><i>PACIENTE INTERNADO:</i>&nbsp;&nbsp;&nbsp;<?php echo $historial->paciente->personapa->getNombreCompleto();?></h3>
            </div>
            <table class="table table-hover bordered">
                <tr>
                    <th>Fecha Solicitud</th>
                    <th>Observaciones</th>
                    <th>Ver detalle</th>
                </tr>

                <?php if($solicitud!=null){
                foreach($solicitud as $sol):?>
                    <tr>
                        <td><?php echo $sol->fecha_solicitud?></td>
                        <td><?php echo $sol->observaciones?></td>
                        <td><?php echo CHtml::link("<i class='fa fa-fw fa-eye'></i>",array('SolicitudServicios/Verdetallesolicitud','id'=>$sol->id_solicitud),array('class'=>'btn btn-primary', 'target'=>'_blank','title'=>'Ver Detalle'))?></td>
                    </tr>
                <?php endforeach; }?>
            </table>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h4>Detalle de Internacion</h4>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                <h3><i>PACIENTE INTERNADO:</i>&nbsp;&nbsp;&nbsp;<?php echo $historial->paciente->personapa->getNombreCompleto();?></h3>
                <h4><B><i>FECHA DE INGRESO A INTERNACION:</i></B>&nbsp;&nbsp;&nbsp;<?php echo $historial->internacionActual->fecha_ingreso?></h4>
            </div>
            <table class="table table-hover bordered">
                <tr>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Total</th>

                </tr>
                <?php $resultado=0;
                foreach($solicitud as $sol):?>
                <?php $detalle=DetalleSolicitudServicio::model()->findAll(array(
                     'condition'=>"id_solicitud='{$sol->id_solicitud}'",
                ));?>
                    <?php foreach($detalle as $det):
                         $servicio=Servicio::model()->findByPk($det->id_servicio)?>
                        <tr>
                            <td><?php echo $servicio->nombre_serv?></td>
                            <td><?php echo $det->cantidad?></td>
                            <td><?php echo $servicio->precioServicio->monto?></td>
                            <td><?php echo $det->estado_realizado?></td>
                            <td><?php echo ($det->cantidad)*($servicio->precioServicio->monto)?></td>
                            <?php $resultado=$resultado+($det->cantidad)*($servicio->precioServicio->monto)?>
                        </tr>
                    <?php endforeach?>
                <?php endforeach?>
                <tr>
                    <td><h3>Total</h3></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><h3><?php echo $resultado?></h3></td>
                </tr>
                </table>

        </div>
    </div>
</div>
</div>