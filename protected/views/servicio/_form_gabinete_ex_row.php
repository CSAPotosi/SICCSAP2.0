<?php if($listaitemgab!=null){?>
<table class="table table-hover bordered" id="tablacli">
    <input type="hidden" value="<?php echo $cat_gab_item;?>" id="campo_item_cat_gab" name="ExamenLaboratorio[id_cat_lab]">
    <tr>
        <th>codigo</th>
        <th>Nombre Servicio</th>
        <th>Monto</th>
        <th>Intitucion</th>
        <th></th>
    </tr>
    <?php foreach($listaitemgab as $list):
            ?>
            <tr>
                <td><?php echo $list->Serviciogab->codigo_serv;?></td>
                <td><?php echo $list->Serviciogab->nombre_serv;?></td>
                <td><?php echo $list->Serviciogab->precioServicio->monto;?></td>
                <td><?php echo $list->Serviciogab->idInsti->nombre;?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/Updateitemcatgab','id'=>$list->Serviciogab->id_servicio),array('title'=>'Actualizar','class'=>'btnitemUpdcatgab'))?>
                    <?php echo CHtml::link('<i class="fa fa-th-list"></i>',array('servicio/detalleitemcatlab','id'=>$list->Serviciogab->id_servicio),array('title'=>'Ver detalle','class'=>'btndeItemcatlab'))?>
                    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                    <?php if($list->Serviciogab->precioServicio1==null){?>
                        <?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deleteitemcatgab','id'=>$list->Serviciogab->id_servicio),array('title'=>'Eliminar','class'=>'btnitemDelcatgab'))?>
                    <?php }?>
                </td>
            </tr>
        <?php

    endforeach?>
</table>
<button type="button" class="btn bg-aqua" data-target="#gabineteexitem" data-toggle="modal">
    <b>Nuevo</b>
</button>
<?php }else{?>
    <div class="callout callout-danger">
        <h2>No Se Encontaron Resultados</h2>
    </div>
    <input type="hidden" value="<?php echo $cat_gab_item;?>" id="campo_item_cat_gab">
    <button type="button" class="btn bg-aqua" data-target="#gabineteexitem" data-toggle="modal">
        <b>Nuevo</b>
    </button>
<?php }?>