<div class="row">
    <di class="col-md-offset-2 col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Lista de Cargos y Horarios Asignados a Empleados
            </div>
            <div class="box-body">
                <div id="Layer1" style="height:200px; overflow: scroll;">
                    <table class="table table-hover bordered">
                        <tr>
                            <th>Empleado</th>
                            <th>Horario</th>
                            <th>Cargo</th>
                            <th>fecha inicio</th>
                            <th>fecha fin</th>
                            <th>Opciones</th>
                        </tr>
                        <?php foreach($listacargosasignados as $list):?>
                            <tr>
                                <td><?php echo $list->EmpleadoAsignacion->personaempleado->nombreCompleto?></td>
                                <td><?php echo $list->HorarioAsignacion->nombre_horario?></td>
                                <td><?php echo $list->CargoAsignacion->nombre_cargo?></td>
                                <td><?php echo $list->fecha_inicio?></td>
                                <td><?php echo $list->fecha_fin?></td>
                                <td>
                                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('/ConvenioInstitucion/ActualizarAsignacion'),array('title'=>'Actualizar'))?>
                                    <?php echo CHtml::link('<i class="fa fa-fw fa-list-ul"></i>',array('ConvenioInstitucion/FinAsignacion'),array('title'=>'Ver servicios','class'=>'btnConvenioServicios'))?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </di>
</div>