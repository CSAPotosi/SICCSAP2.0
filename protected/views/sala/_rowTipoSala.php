<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control input-sm" placeholder="Buscar tipo de sala" id="searchTipoSala"/>
        <span class="input-group-addon bg-blue-gradient"><i class="fa fa-search"></i></span>
    </div>
</div>
<?php if($listaTipoSala!=null):?>
<table class="table table-hover table-bordered dataTable" id="tableTipoSala">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Costo (en Bs.)</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listaTipoSala as $itemTipo):?>
            <tr>
                <td><?php echo $itemTipo->servicio->nombre_serv;?></td>
                <td><?php echo $itemTipo->servicio->precioServicio->monto;?></td>
                <td><input type="checkbox" class="btnChangeStateTipoSala" <?php echo ($itemTipo->servicio->estado_serv==1)?'checked':''; ?> data-toggle="toggle" data-size="mini" data-on="ACTIVO" data-onstyle="primary" data-offstyle="danger" data-off="INACTIVO" data-url="<?php echo CHtml::normalizeUrl(['sala/changeStateTipoSalaAjax','id_tipo'=>$itemTipo->servicio->id_servicio])?>"></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-th-list"></i>',['sala/viewTipoSalaAjax','id'=>$itemTipo->id_tipo_sala],['title'=>'Ver detalle','class'=>'btnVerTipoSala']);?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',['sala/create','id'=>$itemTipo->id_tipo_sala],['title'=>'Editar','class'=>'btnUpdTipoSala']);?>
                    <?php if(!$itemTipo->salas) echo CHtml::link('<span class="glyphicon glyphicon-remove"></span>',['sala/delete','id'=>$itemTipo->id_tipo_sala],['title'=>'Eliminar','class'=>'btnDelTipoSala']);?>
                    <?php echo CHtml::link('<i class="fa fa-folder-open"></i>',['sala/listSalasAjax','id'=>$itemTipo->id_tipo_sala],['title'=>'mostrar salas','class'=>'btnListSala']);?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php else: ?>
    No se encontraron resultados
<?php endif;?>