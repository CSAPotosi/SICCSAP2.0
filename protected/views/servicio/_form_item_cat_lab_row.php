<?php if($listitemlab!=null){?>
<table class="table table-hover bordered" id="tablalab">
    <input type="hidden" value="<?php echo $cat_btn_item;?>" id="campo_item_cat_lab" name="ExamenLaboratorio[id_cat_lab]">
    <tr>
        <th>codigo</th>
        <th>Nombre Servicio</th>
        <th>Monto</th>
        <th>Intitucion</th>
        <th></th>
    </tr>
    <?php foreach($listitemlab as $list):?>
            <tr>
                <td><?php echo $list->serviciodelab->codigo_serv;?></td>
                <td><?php echo $list->serviciodelab->nombre_serv;?></td>
                <td><?php echo $list->serviciodelab->precioServicio->monto;?></td>
                <td><?php echo $list->serviciodelab->idInsti->nombre;?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/Updateitemcatlab','id'=>$list->serviciodelab->id_servicio),array('title'=>'Actualizar','class'=>'btnitemUpdcatlab'))?>
                    <?php echo CHtml::link('<i class="fa fa-th-list"></i>',array('servicio/detalleitemcatlab','id'=>$list->serviciodelab->id_servicio),array('title'=>'Ver detalle','class'=>'btndeItemcatlab'))?>
                    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                    <?php if($list->serviciodelab->precioServicio1==null){?>
                    <?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deleteitemcatlab','id'=>$list->serviciodelab->id_servicio),array('title'=>'Eliminar','class'=>'btnitemDelcatlab'))?>
                    <?php }?>
                    <?php echo CHtml::link('<i class="fa fa-file-text"></i>',['laboratorio/asignarParametros','id_examen'=>$list->id_servicio],['title'=>'Asignar plantilla de laboratorio']);?>
                </td>
            </tr>
    <?php endforeach?>
</table>
<button type="button" class="btn bg-aqua" data-target="#itemlab" data-toggle="modal">
    <b>Nuevo</b>
</button>
<?php }else{?>
    <div class="callout callout-danger">
        <h2>No Se Encontaron Resultados</h2>
    </div>
    <input type="hidden" value="<?php echo $cat_btn_item;?>" id="campo_item_cat_lab">
    <button type="button" class="btn bg-aqua" data-target="#itemlab" data-toggle="modal">
        <b>Nuevo</b>
    </button>
<?php }?>