<div id="Layer1" style="height:200px; overflow: scroll;">
    <table class="table table-hover bordered">
        <tr>
            <th>Nombre Unidad</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </tr>
        <?php foreach($listahorarios as $list):?>
            <tr data-nombre="<?php echo $list->nombre_horario?>">
                <td><?php echo $list->nombre_horario?></td>
                <td><?php echo $list->tipo_horario?></td>
                <td><input type="checkbox" class="btnChangeState" <?php echo ($list->estado)?'checked':''; ?> data-toggle="toggle" data-size="mini" data-on="ACTIVO" data-onstyle="primary" data-offstyle="danger" data-off="INACTIVO" data-url="<?php echo CHtml::normalizeUrl(['horario/ChangeStateHorario','id'=>$list->id_horario]);?>"></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('horario/ActualizarHorario','id'=>$list->id_horario),array('title'=>'Actualizar'))?>
                    <?php echo CHtml::link('<i class="fa fa-fw fa-list-ul"></i>',array('horario/VerTurnosHorario','id'=>$list->id_horario),array('title'=>'Ver cargos','class'=>'btnTurnosHorario'))?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>