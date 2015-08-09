<?php if($listaturnos!=null){?>
    <div class="row">
        <div class="col-md-12">
            <span class="label label-danger pull-left"><?php echo $horario->nombre_horario?></span>
        </div>
    </div>
    <div id="Layer1" style="height:200px; overflow: scroll;">
        <table class="table table-hover bordered">
            <tr>
                <th>Nombre Turno</th>
                <th>Tipo Turno</th>
                <th>Hora Entrada</th>
                <th>Inicio Entrada</th>
                <th>Fin Entrada</th>
                <th>Hora Salida</th>
                <th>Inicio Salida</th>
                <th>Fin Salida</th>
                <th>Tolerancia</th>
                <th>daaa</th>
                <th>Horario</th>
                <th>Opciones</th>
            </tr>
            <?php foreach($listaturnos as $list):?>
                <tr data-nombre="<?php echo $list->nombre_turno?>">
                    <td><?php echo $list->nombre_turno?></td>
                    <td><?php echo $list->tipo_turno?></td>
                    <td><?php echo $list->hora_entrada?></td>
                    <td><?php echo $list->inicio_entrada?></td>
                    <td><?php echo $list->fin_entrada?></td>
                    <td><?php echo $list->hora_salida?></td>
                    <td><?php echo $list->inicio_salida?></td>
                    <td><?php echo $list->fin_salida?></td>
                    <td><?php echo $list->tolerancia?></td>
                    <td><?php echo $list->dias?></td>
                    <td><?php echo $list->HorarioTurno->nombre_horario?></td>
                    <td>
                        <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('/horario/ActualizarTurno','id'=>$list->id_turno),array('title'=>'Actualizar','class'=>'btnactualizarturno'))?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
<?php }else{?>
    <div class="row">
        <div class="col-md-12">
            <span class="label label-danger pull-left"><?php echo $horario->nombre_horario?></span>
        </div>
    </div>
    <br>
    <div class="callout callout-danger">
        <h4>No existe Turnos en este Horario</h4>
    </div>
<?php }?>
<input type="hidden" value="<?php echo $horario->id_horario?>" id="idHorarioTurno">
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-target="#TurnoHorario" data-toggle="modal">
            <b>Agregar Turnos</b>
        </button>
    </div>
</div>