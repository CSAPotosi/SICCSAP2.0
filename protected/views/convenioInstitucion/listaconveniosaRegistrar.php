<input id="flag" type="hidden" value="1">
<div id="Layer1" style="height:200px; overflow: scroll;">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'detalle-form-convenio-servicio',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <table class="table table-hover bordered" id="contenedor2">
        <tr>
            <th width="20%">Servicio</th>
            <th align="center" width="20%">Monto</th>
            <th align="center" width="20%">Opcion</th>
            <th align="center" width="20%">Descuento</th>
            <th align="center" width="20%">Descripcion</th>
        </tr>
        <?php if($listaconvenios!=null){?>
            <?php if($listaservicio!=null){?>
                <?php foreach($CovenioServicios as $list):?>
                    <tr  class="valor" id="<?php echo $list->idServicio->id_servicio?>">
                        <td width="20%"><?php echo $list->idServicio->nombre_serv?></td>
                        <td align="center" width="20%"><?php echo $list->idServicio->precioServicio->monto?></td>
                        <td class="hidden" name="datos"><?php echo $list->idServicio->id_servicio?></td>
                        <td align="center" class="hidden" name="datos"><?php if($list->idServicio->id_servicio!=1){?>
                                <span class="label label-danger">inactivo</span>
                            <?php }else{?>
                                <span class="label label-danger">activo</span>
                            <?php }?></td>
                        <td align="center" class="hidden" name="datos"><?php echo $list->idServicio->fecha_actualizacion?></td>
                        <td align="center" class="hidden" name="datos"><?php echo $list->idServicio->idInsti->nombre?></td>
                        <td witch="20%">
                            <input type="checkbox" checked="true" class="servicio" value="<?php echo $list->idServicio->id_servicio?>">
                        </td>
                        <td class="" name="ocultar" width="20%">
                            <div class="input-group">
                                <?php echo CHtml::activeTextField($list,"[".$list->idServicio->id_servicio."]descuento_servicio",array('class'=>'form-control'))?>
                                <span class="input-group-addon">%</span>
                            </div>
                            <?php echo CHtml::error($list,"[".$list->idServicio->id_servicio."]descuento_servicio",array('class'=>'label label-danger')); ?>

                        </td>
                        <td class="" name="ocultar" width="20%">
                            <input type="textArea" class="form-control" name="ConvenioServicios[<?php echo $list->id_servicio?>][descripcion]">
                        </td>
                        <td class="hidden" name="info">
                            <input type="text" value="<?php echo $convenio?>" name="ConvenioServicios[<?php echo $list->idServicio->id_servicio?>][id_convenio_institucion]">
                            <input type="text" value="<?php echo $list->idServicio->id_servicio?>" name="ConvenioServicios[<?php echo $list->idServicio->id_servicio?>][id_servicio]">
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php }?>
        <?php }?>
    </table>
    <?php $this->endWidget(); ?>
</div>
