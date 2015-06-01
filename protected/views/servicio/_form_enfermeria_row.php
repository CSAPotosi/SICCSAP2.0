<?php if($listaitemcli!=null){?>
    <table class="table table-hover bordered" id="tablacli">
        <input type="hidden" value="<?php echo $cat_cli_item;?>" id="campo_item_cat_enf" name="ExamenServicioClinico[id_cat_cli]">
        <tr>
            <th>codigo</th>
            <th>Nombre Servicio</th>
            <th>Monto</th>
            <th>Intitucion</th>
            <th></th>
        </tr>
        <?php foreach($listaitemcli as $list):
            ?>
            <tr>
                <td><?php echo $list->ServicioCli->codigo_serv;?></td>
                <td><?php echo $list->ServicioCli->nombre_serv;?></td>
                <td><?php echo $list->ServicioCli->precioServicio->monto;?></td>
                <td><?php echo $list->ServicioCli->idInsti->nombre;?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/Updateitemcatenf','id'=>$list->ServicioCli->id_servicio),array('title'=>'Actualizar','class'=>'btnitemUpdcatenf'))?>
                    <?php echo CHtml::link('<i class="fa fa-th-list"></i>',array('servicio/detalleitemcatcli','id'=>$list->ServicioCli->id_servicio),array('title'=>'Ver detalle','class'=>'btndeItemcatcli'))?>
                    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                    <?php if($list->ServicioCli->precioServicio1==null){?>
                        <?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deleteitemcatenf','id'=>$list->ServicioCli->id_servicio),array('title'=>'Eliminar','class'=>'btnitemDelcatcli'))?>
                    <?php }?>
                </td>
            </tr>
        <?php

        endforeach?>
    </table>
    <button type="button" class="btn bg-aqua" data-target="#enfermeria" data-toggle="modal">
        <b>Nuevo</b>
    </button>
<?php }else{?>
    <div class="callout callout-danger">
        <h2>No Se Encontaron Resultados</h2>
    </div>
    <input type="hidden" value="<?php echo $cat_cli_item;?>" id="campo_item_cat_enf" name="ExamenServicioClinico[id_cat_cli]">
    <button type="button" class="btn bg-aqua" data-target="#enfermeria" data-toggle="modal">
        <b>Nuevo</b>
    </button>
<?php }?>