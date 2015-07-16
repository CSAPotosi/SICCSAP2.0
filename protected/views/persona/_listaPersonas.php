<ul class="timeline " >
    <?php foreach($listaPersonas as $personaModel): ?>
    <?php
        $color=($personaModel->paciente)?'bg-green':'bg-blue';
        $icono=(($personaModel->paciente)?'fa-wheelchair':'fa-male');
        ?>
    <li>
        <i class="fa fa-fw fa-<?php echo ($personaModel->sexo=='FEMENINO')?'female':'male';?> <?php echo $color;?>"></i>
        <div class="timeline-item">
            <span class="time text-bold">CSA-<?php echo $personaModel->codigo;?></span>
            <h3 class="timeline-header">
                <?php echo CHtml::link($personaModel->nombreCompleto,array('persona/view','id'=>$personaModel->id));?>
            </h3>
            <div class="timeline-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo CHtml::image(Yii::app()->baseUrl.'/fotografias/'.$personaModel->fotografia,null,array('class'=>'img-circle img-thumbnail img-responsive '))  ?>
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn  bg-green"><i class="fa fa-fw fa-wheelchair"></i></button>
                            <button type="button" class="btn  bg-red"><i class="fa fa-fw fa-stethoscope "></i></button>
                            <button type="button" class="btn  btn-tumblr"><i class="fa fa-fw fa-medkit "></i></button>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-striped">
                            <tbody>
                            <tr >
                                <td><b><?php echo $personaModel->getAttributeLabel('dni'); ?>:</b></td>
                                <td><?php echo $personaModel->dni;?></td>
                            </tr>
                            <tr >
                                <td><b><?php echo $personaModel->getAttributeLabel('direccion'); ?>:</b></td>
                                <td><?php echo $personaModel->direccion;?></td>
                            </tr>
                            <tr >
                                <td><b><?php echo $personaModel->getAttributeLabel('telefono'); ?>:</b></td>
                                <td><?php echo $personaModel->telefono;?></td>
                            </tr>
                            <tr >
                                <td><b><?php echo $personaModel->getAttributeLabel('fecha_nacimiento'); ?>:</b></td>
                                <td><?php echo $personaModel->fecha_nacimiento;?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="timeline-footer">
                <?php echo CHtml::link('Ver Detalle',array('persona/view','id'=>$personaModel->id),array('class'=>'btn btn-primary btn-xs'));?>

                <?php
                if($tipo_persona=='paciente'){
                echo ($personaModel->paciente)?CHtml::link('Ver Historia',array('historialPaciente/view','id'=>$personaModel->id),array('class'=>'btn bg-green btn-xs')):CHtml::link('Agregar Info. de Paciente',array('persona/update','id'=>$personaModel->id),array('class'=>'btn bg-green btn-xs'));
                echo ($personaModel->paciente?CHtml::link('Hacer Solicitud de Servicios',array('SolicitudServicios/Create','id'=>$personaModel->id),array('class'=>'btn btn-warning btn-xs pull-right')):'');
                }?>
                <?php
                if($tipo_persona=='empleado')
                echo ($personaModel->empleado)?CHtml::link('Ver Empleado',array('historialPaciente/view','id'=>$personaModel->id),array('class'=>'btn btn-social btn-tumblr btn-xs')):CHtml::link('Agregar Info. Empleado',array('persona/Updateempleado','id'=>$personaModel->id),array('class'=>'btn btn-social btn-tumblr btn-xs'));
                ?>
                <?php if($tipo_persona=='medico'){
                    $listaespecialidad=Especialidad::model()->findAll(array(
                        'order'=>'id_especialidad ASC',
                    ));
                echo ($personaModel->medico)?CHtml::link('Ver medico',array('infoMedicos','id'=>$personaModel->id),array('class'=>'btn bg-red btn-xs')):CHtml::link('Agregar Info. de Medico',array('/medico/CrearMedicoComplementarios','id'=>$personaModel->id),array('class'=>'btn bg-red btn-xs'));
                }
                ?>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
