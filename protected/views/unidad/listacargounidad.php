<?php if($listacargos!=null){?>
    <div class="row">
        <div class="col-md-12">
            <span class="label label-danger pull-left"><?php echo $unidad->nombre_unidad?></span>
        </div>
    </div>
    <div id="Layer1" style="height:200px; overflow: scroll;">
        <table class="table table-hover bordered">
            <tr>
                <th>Nombre Cargo</th>
                <th>Unidad</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
            <?php foreach($listacargos as $list):?>
                <tr data-nombre="<?php echo $list->nombre_cargo?>">
                    <td><?php echo $list->nombre_cargo?></td>
                    <td><?php echo $list->UnidadCargo->nombre_unidad?></td>
                    <td><?php echo $list->descripcion_cargo?></td>
                    <td><input type="checkbox" class="btnChangeState" <?php echo ($list->estado)?'checked':''; ?> data-toggle="toggle" data-size="mini" data-on="ACTIVO" data-onstyle="primary" data-offstyle="danger" data-off="INACTIVO" data-url="<?php echo CHtml::normalizeUrl(['Unidad/ChangeStateCargo','id'=>$list->id_cargo]);?>"></td>
                    <td>
                        <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('/Unidad/ActualizarCargo','id'=>$list->id_cargo),array('title'=>'Actualizar','class'=>'ActualizarUnidadCargo'))?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
<?php }else{?>
    <div class="row">
        <div class="col-md-12">
            <span class="label label-danger pull-left"><?php echo $unidad->nombre_unidad?></span>
        </div>
    </div>
    <br>
    <div class="callout callout-danger">
        <h4>No existe Cargos en Unidad</h4>
    </div>
<?php }?>
<input type="hidden" value="<?php echo $unidad->id_unidad?>" id="id_unidad_cargo">
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-target="#Unidadcargo" data-toggle="modal">
            <b>Agregar Servicios</b>
        </button>
    </div>
</div>