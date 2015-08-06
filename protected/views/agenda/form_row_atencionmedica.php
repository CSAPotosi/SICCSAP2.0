<table class="table table-hover bordered">
    <thead>
    <tr>
        <th>Atencion Medica</th>
        <th>Medico</th>
        <th>Especialidad</th>
        <th>Tipo Atencion</th>
        <th>Telefono</th>
        <th>Costo</th>
        <th><center>Opciones</center></th>
    </tr>
    </thead>
    <tbody>
    <?php if($atencion!=null){?>
        <?php foreach($atencion as $list):?>
            <?php $servicio=Servicio::model()->findByPk($list->id_servicio)?>
            <tr class="val" data-nombre="<?php echo $list->idME->idMedico->medicopersona->nombreCompleto?>" data-especialidad="<?php echo $list->idME->idEspecialidad->nombre_especialidad?>" data-tipo="<?php echo $list->tipo_atencion?>">
                <td><?php echo $servicio->nombre_serv?></td>
                <td><?php echo $list->idME->idMedico->medicopersona->nombreCompleto?></td>
                <td><?php echo $list->idME->idEspecialidad->nombre_especialidad?></td>
                <td><?php echo $list->tipo_atencion?></td>
                <td><?php echo $list->idME->idMedico->medicopersona->telefono?></td>
                <td><?php echo $servicio->precioServicio->monto?></td>

                <td><center><?php echo CHtml::link('<i class="fa fa-th-list"></i>',array('agenda/detalleAtencionesMedicas','id'=>$servicio->id_servicio),array('title'=>'Ver detalle','class'=>'btnAtenMedi'))?></center></td>
            </tr>
        <?php endforeach;?>
    <?php }?>
    </tbody>
</table>