<div id="Layer1" style="height:200px; overflow: scroll;">
    <table class="table table-hover bordered">
        <tr>
            <th>Nombre Unidad</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </tr>
        <?php foreach($listaunidad as $list):?>
            <tr data-nombre="<?php echo $list->nombre_unidad?>">
                <td><?php echo $list->nombre_unidad?></td>
                <td><?php echo $list->descripcion_unidad?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('/Unidad/Update','id'=>$list->id_unidad),array('title'=>'Actualizar'))?>
                    <?php echo CHtml::link('<i class="fa fa-fw fa-list-ul"></i>',array('Unidad/VerCargosUnidad','id'=>$list->id_unidad),array('title'=>'Ver cargos','class'=>'btnCargosUnidades'))?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>