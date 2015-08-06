<table class="table table-hover bordered">
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre Servicio</th>
        <th>Medico</th>
        <th>Especialidad</th>
        <th>Monto</th>
        <th>Tipo Atencion</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($atencionmedica as $list):?>
        <tr>
            <td><?php echo $list->idServicio->codigo_serv?></td>
            <td><?php echo $list->idServicio->nombre_serv?></td>
            <td><?php echo $list->idME->idMedico->medicopersona->nombreCompleto?></td>
            <td><?php echo $list->idME->idEspecialidad->nombre_especialidad?></td>
            <td><?php echo $list->idServicio->precioServicio->monto?></td>
            <td><?php echo $list->tipo_atencion?></td>
            <td>
                <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/ActualizarAtencionMedica','id'=>$list->id_servicio),array('title'=>'Actualizar','class'=>'btnAtencionEspecialidad'))?>
                <?php if($list->idServicio->precioServicio1==null){?>
                <?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/EliminarAtencionMedica','id'=>$list->id_servicio),array('title'=>'Eliminar','class'=>'btnEliminarAtencion'))?>
                <?php }?>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>