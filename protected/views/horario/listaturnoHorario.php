        <table class="table table-hover bordered">
            <tr>
                <th>Nombre Turno</th>

                <th>Hora Entrada</th>
                <th>Inicio Entrada</th>
                <th>Fin Entrada</th>
                <th>Hora Salida</th>
                <th>Inicio Salida</th>
                <th>Fin Salida</th>
                <th>Tolerancia</th>
                <th>Tipo Turno</th>
                <th>Opciones</th>
            </tr>
            <?php foreach($listaTurno as $list):?>
                <tr data-nombre="<?php echo $list->nombre_turno?>">
                    <td><?php echo $list->nombre_turno?></td>
                    <td><?php echo $list->hora_entrada?></td>
                    <td><?php echo $list->inicio_entrada?></td>
                    <td><?php echo $list->fin_entrada?></td>
                    <td><?php echo $list->hora_salida?></td>
                    <td><?php echo $list->inicio_salida?></td>
                    <td><?php echo $list->fin_salida?></td>
                    <td><?php echo $list->tolerancia?></td>
                    <td><?php echo $list->tipo_turno?></td>
                    <td>
                        <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('/horario/ActualizarTurno','id'=>$list->id_turno),array('title'=>'Actualizar','class'=>'btnactualizarturno'))?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>


