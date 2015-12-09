<div id="Layer1" style="height:200px; overflow: scroll;">
    <table class="table table-hover bordered">
        <tr>
            <th>Nombre Unidad</th>
            <th>Descripcion</th>
            <th>Ciclo de trabajo</th>
            <th>Opciones</th>
        </tr>
        <?php foreach($listahorarios as $list):?>
            <tr data-nombre="<?php echo $list->nombre_horario?>">
                <td><?php echo $list->nombre_horario?></td>
                <td><?php echo $list->descripcion?></td>
                <td><?php echo $list->total_dias?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('horario/ActualizarHorario','id'=>$list->id_horario),array('title'=>'Actualizar'))?>
                    <?php echo CHtml::link('<i class="fa fa-fw fa-list-ul"></i>',array('horario/ViewDetailHorario','id_h'=>$list->id_horario),array('title'=>'Ver detalle','class'=>'btnViewDetailHorario','data-id'=>$list->id_horario,'data-href'=>CHtml::normalizeUrl(['horario/detalleHorario','id_h'=>$list->id_horario])));?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>