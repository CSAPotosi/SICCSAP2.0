<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Servicios Disponibles
            </div>
            <div class="box-body">
                <div id="Layer1" style="height:200px; overflow: scroll;">
                    <table class="table table-hover bordered" id="contenedor1">
                        <tr>
                            <th align="center">Servicio</th>
                            <th align="center">Monto</th>
                            <th align="center">Unidad del Servicio</th>
                            <th align="center">Estado Servicio</th>
                            <th align="center">Fecha Actualizacion</th>
                            <th align="center">Institucion</th>
                            <th align="center">Opciones</th>
                        </tr>
                        <?php if($listaservicio!=null){?>
                        <?php foreach($listaservicio as $list):?>
                            <tr  class="valor" id="<?php echo $list->id_servicio?>">
                                <td align="center"><?php echo $list->nombre_serv?></td>
                                <td align="center"><?php echo $list->precioServicio->monto?></td>
                                <td align="center" name="datos"><?php echo $list->unidad_serv?></td>
                                <td align="center" name="datos"><?php if($list->estado_serv!=1){?>
                                        <span class="label label-danger">inactivo</span>
                                    <?php }else{?>
                                        <span class="label label-danger">activo</span>
                                    <?php }?></td>
                                <td align="center" name="datos"><?php echo $list->fecha_actualizacion?></td>
                                <td align="center" name="datos"><?php echo $list->idInsti->nombre?></td>
                                <td align="center">
                                    <input type="checkbox" class="servicio" value="<?php echo $list->id_servicio?>">
                                </td>
                                <td class="hidden" name="ocultar">
                                    <div class="input-group">
                                        <?php echo CHtml::activeTextField($ConvenioServicios,"[".$list->id_servicio."]descuento_servicio",array('class'=>'form-control'))?>
                                        <span class="input-group-addon">%</span>
                                    </div>
                                    <?php echo CHtml::error($ConvenioServicios,"[".$list->id_servicio."]descuento_servicio",array('class'=>'label label-danger')); ?>
                                </td>
                                <td class="hidden" name="ocultar">
                                    <input type="textArea" class="form-control" name="ConvenioServicios[<?php echo $list->id_servicio?>][descripcion]">
                                </td>
                                <td class="hidden" name="info">
                                    <input type="text" value="<?php echo $convenio?>" name="ConvenioServicios[<?php echo $list->id_servicio?>][id_convenio_institucion]">
                                    <input type="text" value="<?php echo $list->id_servicio?>" name="ConvenioServicios[<?php echo $list->id_servicio?>][id_servicio]">
                                </td>
                            </tr>
                        <?php endforeach;?>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Servicios a Registrar
            </div>
            <div class="box-body">
                <div id="contenedorlistaconvenio">
                    <?php $this->renderPartial('listaconveniosaRegistrar',array('listaconvenios'=>$listaconvenios))?>
                 </div>
            </div>
        </div>
    </div>
</div>