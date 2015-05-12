<table class="table table-hover bordered" id="tablalab">
    <input type="hidden" value="<?php echo $cat_btn_item;?>" id="campo_item_cat_lab" name="ExamenLaboratorio[id_cat_lab]">
    <tr>
        <th>codigo</th>
        <th>Nombre Servicio</th>
        <th>Monto</th>
        <th>Intitucion</th>
        <th></th>
    </tr>
    <?php foreach($listitemlab as $list):
        if($list->id_cat_lab==$cat_btn_item){
        ?>
            <tr>
                <td><?php echo $list->serviciodelab->codigo_serv;?></td>
                <td><?php echo $list->serviciodelab->nombre_serv;?></td>
                <td><?php echo $list->serviciodelab->precioServicio->monto;?></td>
                <td><?php echo $list->serviciodelab->idInsti->nombre;?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/updateitemcatlab','id'=>$list->serviciodelab->id_servicio),array('title'=>'Actualizar','class'=>'btnitemUpdcatlab'))?>
                    <?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deleteitemcatlab','id'=>$list->serviciodelab->id_servicio),array('title'=>'Eliminar','class'=>'btnitemDelcatlab'))?>
                    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                    <?php echo CHtml::link('<i class="fa fa-th-list"></i>',array('servicio/detalleitemcatlab','id'=>$list->serviciodelab->id_servicio),array('title'=>'Ver items','class'=>'btnItemcatlab'))?>
                </td>
            </tr>
    <?php
        }
    endforeach?>
</table>