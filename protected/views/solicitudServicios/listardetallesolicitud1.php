
<table class="table table-hover bordered" id="tabladetallesolicitud">
    <?php $listadetallesolicitud=DetalleSolicitudServicio::model()->findAll();?>
    <tr>
        <th>Paciente</th>
        <th>Servicio</th>
        <th>Estado</th>
        <th>Autorizacion</th>
    </tr>
    <?php foreach($listadetallesolicitud as $lis):?>
        <?php $servicio=Servicio::model()->findByPk($lis->id_servicio)?>
        <?php $sol=SolicitudServicios::model()->findByPk($lis->id_solicitud)?>
        <tr>
            <td><?php echo $sol->idHistorial->paciente->personapa->getNombreCompleto();?></td>
            <td><?php echo $servicio->nombre_serv?></td>
            <?php if($lis->estado_realizado=="realizado"){?>
                <td><span class="badge bg-blue">realizado</span></td>
            <?php }else{?>
                <td><span class="badge bg-red">no realizado</span></td>
            <?php }?>
            <?php if($lis->autorizacion=="autorizado"){?>
                <td><span class="badge bg-blue">autorizado</span></td>
            <?php }else{?>
                <td><span class="badge bg-red">no autorizado</span></td>
            <?php }?>
        </tr>
    <?php endforeach?>
</table>
