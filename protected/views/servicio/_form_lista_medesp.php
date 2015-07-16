<table class="table table-hover bordered">
    <thead>
        <th>Medico</th>
        <th>Especialidad</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        <?php foreach($medicoEspecialidadlista as $medEspe):
            if($medEspe->atencionMedicas==null){?>
            <tr>
                <td><?php echo $medEspe->idMedico->medicopersona->getNombreCompleto();?></td>
                <td><?php echo $medEspe->idEspecialidad->nombre_especialidad;?></td>
                <td><?php echo CHtml::link('<i class="fa fa-fw fa-tasks"></i>',array('servicio/CrearServicioAtencion','id'=>$medEspe->id_m_e),array('title'=>'Dar Servicio','class'=>'btnagregarprecio'))?></td>
            </tr>
        <?php } endforeach;?>
    </tbody>
</table>