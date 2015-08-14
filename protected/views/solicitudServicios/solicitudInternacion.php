<?php
$this->breadcrumbs=array(
    'Pacientes'=>array('persona/index'),
    'CSA-'.$modelInternacion->historial->paciente->personapa->codigo=>['historialPaciente/view','id'=>$modelInternacion->historial->id_historial],
    'Historia de internacion',
);
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['historialPaciente/view','id'=>$modelInternacion->historial->id_historial]).' Historial de internacion - Servicios';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>
<nav class="navbar navbar-menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuHistoria" aria-expanded="false">
                <span class="sr-only">Opciones de historia</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menuHistoria">
            <ul class="nav navbar-nav">
                <li ><?php echo CHtml::link('Datos generales',['internacion/index','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Kardex de enfermeria',['evolucionEnfermeria/showKardex','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter]);?></li>
                <li class="active"><?php echo CHtml::link('Ordenes de servicio',['SolicitudServicios/OrdenInternacion','id'=>$modelInternacion->historial->id_historial,'id_inter'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Servicios otorgados',['SolicitudServicios/VerServiciosInternacion','id'=>$modelInternacion->historial->id_historial,'id_inter'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Alta',['internacion/altaMedica','id'=>$modelInternacion->id_inter]);?></li>
            </ul>
        </div>
    </div>
</nav>


    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Orden de Examen</h3>
                </div>
                <div id="contenido_solicitudServicios">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="callout callout-info">
                                <h4>PACIENTE</h4>
                                <?php $nombre_pa=Persona::model()->findByPk($historial)?>
                                <p><?php echo $nombre_pa->nombreCompleto;?></p>
                            </div>
                            <div class="hidden">
                                <?php $this->renderPartial('/consulta/_form_solicitud',array('historial'=>$historial,'solicitud'=>$solicitud))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Servicios</h3>
                        <div class="input-group margin">
                            <input class="form-control" type="text" id="buscasolser" placeholder="Item de Examen de gabinete">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group" id="radios">
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="checked" name="checked" value="1">
                        <b>Laboratorio</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="checked" name="checked" value="2">
                        <b>Gabinete</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="checked" name="checked" value="3">
                        <b>Otros servicios</b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="checked" name="checked" value="4">
                        <b>Todo</b>
                    </div>
                    <div id="contenido_solSerDetalle">
                        <?php $lab=CategoriaExLaboratorio::model()->findAll();?>
                        <?php $gab=CategoriaExGabinete::model()->findAll()?>
                        <?php $ser=CategoriaServicioClinico::model()->findAll()?>
                        <div class="row" id="labo">
                            <div class="col-md-12">
                                <h4>Laboratorio</h4>
                            </div>
                            <?php foreach($lab as $l):?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="box box-primary">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title"><?php echo $l->nombre_cat_lab;?></h3>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="contenedorlaboratorio">
                                                <?php $Ex=ExamenLaboratorio::model()->findAll(array(
                                                    'condition'=>"id_cat_lab ='{$l->id_cat_lab}'",
                                                ));?>
                                                <table class="table table-hover bordered" id="<?php echo $l->nombre_cat_lab;?>">
                                                    <?php foreach($Ex as $e):
                                                        ?>
                                                        <tr class="val" data-tipo="<?php echo $e->serviciodelab->nombre_serv?>" name="<?php echo $e->serviciodelab->nombre_serv?>" name-titulo="<?php echo $l->nombre_cat_lab;?>" precio="<?php echo $e->serviciodelab->precioServicio->monto?>" id="<?php echo $e->serviciodelab->precioServicio->id_servicio?>">
                                                            <td>
                                                                <?php echo $e->serviciodelab->nombre_serv;?>
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->serviciodelab->id_servicio."]id_solicitud",array('class'=>'idsolicitud','value'=>'','id'=>'valor_solicitud'))?>
                                                                <input type="hidden" name="DetalleSolicitudServicio[<?php echo $e->serviciodelab->id_servicio;?>][id_servicio]" value="<?php echo $e->serviciodelab->precioServicio->id_servicio?>">
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->serviciodelab->id_servicio."]estado_realizado",array('value'=>"no realizado",'id'=>'estado_realizado'))?>
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->serviciodelab->id_servicio."]autorizacion",array('class'=>'autorizacion', 'value'=>'no autorizado','id'=>'autorizacion'))?>
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->serviciodelab->id_servicio."]estado_pago",array('class'=>'pago', 'value'=>'no pagado','id'=>'estado_pago'))?>
                                                            </td>
                                                            <td class="hide"><input type="text" value="<?php echo $e->serviciodelab->precioServicio->monto?>" name="DetalleSolicitudServicio[<?php echo $e->serviciodelab->precioServicio->id_servicio?>][precio_servicio]" id="precio_ser"></td>
                                                            <td class="hide" name="ocultar"><span class="badge bg-red"><?php echo $e->serviciodelab->idInsti->nombre?></span></td>
                                                            <td class="cantidad hide" name="ocultar"><input class="cantidad" type="text" name="DetalleSolicitudServicio[<?php echo $e->serviciodelab->id_servicio;?>][cantidad]" id="cantidad" value="1"></td>
                                                            <td class="checkk"><input class="checkeded" type="checkbox" value="<?php echo $e->serviciodelab->id_servicio;?>"/></td>
                                                        </tr>
                                                    <?php endforeach?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach?>
                        </div>
                        <div class="row" id="gabi">
                            <div class="col-md-12">
                                <h4>Gabinete</h4>
                            </div>
                            <?php foreach($gab as $l):?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="box box-primary">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title"><?php echo $l->nombre_cat_gab;?></h3>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="contenedorlaboratorio">
                                                <?php $Ex=ExamenGabinete::model()->findAll(array(
                                                    'condition'=>"id_cat_gab ='{$l->id_cat_gab}'",
                                                ));?>
                                                <table class="table table-hover bordered" id="<?php echo $l->nombre_cat_gab;?>">
                                                    <?php foreach($Ex as $e):?>
                                                        <tr class="val" data-tipo="<?php echo $e->Serviciogab->nombre_serv?>" name="<?php echo $e->Serviciogab->nombre_serv?>" name-titulo="<?php echo $l->nombre_cat_gab;?>" precio="<?php echo $e->Serviciogab->precioServicio->monto?>" id="<?php echo $e->Serviciogab->precioServicio->id_servicio?>">
                                                            <td>
                                                                <?php echo $e->Serviciogab->nombre_serv;?>
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->Serviciogab->precioServicio->id_servicio."]id_solicitud",array('class'=>'idsolicitud','value'=>'','id'=>'valor_solicitud'))?>
                                                                <input type="hidden" name="DetalleSolicitudServicio[<?php echo $e->Serviciogab->precioServicio->id_servicio?>][id_servicio]" value="<?php echo $e->Serviciogab->precioServicio->id_servicio?>">
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->Serviciogab->id_servicio."]estado_realizado",array('value'=>'no realizado','id'=>'estado_realizado'))?>
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->Serviciogab->id_servicio."]autorizacion",array('class'=>'autorizacion','value'=>'no autorizado','id'=>'autorizacion'))?>
                                                                <?php echo CHtml::activeHiddenField($detsolser,"[".$e->Serviciogab->id_servicio."]estado_pago",array('class'=>'pago', 'value'=>'no pagado','id'=>'estado_pago'))?>
                                                            </td>
                                                            <td class="hide"><input type="text" value="<?php echo $e->Serviciogab->precioServicio->monto?>" name="DetalleSolicitudServicio[<?php echo $e->Serviciogab->precioServicio->id_servicio?>][precio_servicio]" id="precio_ser"></td>
                                                            <td class="hide" name="ocultar"><span class="badge bg-red"><?php echo $e->Serviciogab->idInsti->nombre?></span></td>
                                                            <td class="cantidad hide" name="ocultar"><input class="cantidad" type="text" name="DetalleSolicitudServicio[<?php echo $e->Serviciogab->precioServicio->id_servicio?>][cantidad]" id="cantidad" value="1"></td>
                                                            <td class="checkk"><input class="checkeded" type="checkbox" value="<?php echo $e->Serviciogab->id_servicio;?>"/></td>
                                                        </tr>
                                                    <?php endforeach?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach?>
                        </div>
                        <div class="row" id="otros">
                            <div class="col-md-12" >
                                <h4>Otros Servicios</h4>
                            </div>
                            <?php foreach($ser as $l):

                                ?>
                                <div class="col-md-4">
                                    <div class="box box-primary">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title"><?php echo $l->nombre_cat_cli;?></h3>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="contenedorlaboratorio">
                                                <?php
                                                $Ex=ServicioClinico::model()->findAll(array(
                                                    'condition'=>"id_cat_cli ='{$l->id_cat_cli}'",
                                                ));?>
                                                <table class="table table-hover bordered" id="<?php echo $l->nombre_cat_cli;?>">
                                                    <?php foreach($Ex as $e):?>
                                                        <?php if($e->ServicioCli->id_insti==1){?>
                                                            <tr class="val" data-tipo="<?php echo $e->ServicioCli->nombre_serv?>" name-titulo="<?php echo $l->nombre_cat_cli;?>" name="<?php echo $e->ServicioCli->nombre_serv?>" precio="<?php echo $e->ServicioCli->precioServicio->monto?>" id="<?php echo $e->ServicioCli->precioServicio->id_servicio?>">
                                                                <td>
                                                                    <?php echo $e->ServicioCli->nombre_serv;?>
                                                                    <?php echo CHtml::activeHiddenField($detsolser,"[".$e->ServicioCli->precioServicio->id_servicio."]id_solicitud",array('class'=>'idsolicitud','value'=>'','id'=>'valor_solicitud'))?>
                                                                    <input type="hidden" name="DetalleSolicitudServicio[<?php echo $e->ServicioCli->precioServicio->id_servicio?>][id_servicio]" value="<?php echo $e->ServicioCli->precioServicio->id_servicio?>">
                                                                    <?php echo CHtml::activeHiddenField($detsolser,"[".$e->ServicioCli->id_servicio."]estado_realizado",array('value'=>'no realizado','id'=>'estado_realizado'))?>
                                                                    <?php echo CHtml::activeHiddenField($detsolser,"[".$e->ServicioCli->id_servicio."]autorizacion",array('class'=>'autorizacion','value'=>'no autorizado','id'=>'autorizacion'))?>
                                                                    <?php echo CHtml::activeHiddenField($detsolser,"[".$e->ServicioCli->id_servicio."]estado_pago",array('class'=>'pago', 'value'=>'no pagado','id'=>'estado_pago'))?>
                                                                </td>
                                                                <td class="hide"><input type="text" value="<?php echo $e->ServicioCli->precioServicio->monto?>" name="DetalleSolicitudServicio[<?php echo $e->ServicioCli->precioServicio->id_servicio?>][precio_servicio]" id="precio_ser"></td>
                                                                <td class="hide" name="ocultar"><span class="badge bg-red"><?php echo $e->ServicioCli->idInsti->nombre?></span></td>
                                                                <td class="cantidad hide" name="ocultar"><input class="cantidad" type="text" name="DetalleSolicitudServicio[<?php echo $e->ServicioCli->precioServicio->id_servicio?>][cantidad]" id="cantidad" value="1"></td>
                                                                <td class="checkk"><input class="checkeded" type="checkbox" value="<?php echo $e->ServicioCli->id_servicio;?>"/></td>
                                                            </tr>
                                                        <?php }?>
                                                    <?php endforeach?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Items de Categoria</h3>
                    </div>
                    <?php $this->renderPartial('/solicitudServicios/detallesolicitudinternacion',array('detsolser'=>$detsolser))?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php Yii::app()->clientScript->registerScript('controlsolicitudserviciosinternacion','
    $(document).ready(function(){
        $("input[type=\'checkbox\'],input[type=\'radio\']").iCheck({
                checkboxClass:"icheckbox_minimal-red",
                radioClass:"iradio_minimal-blue"
        });
        $("#buscasolser").on("keyup",function(){
            var texto=$(this).val();
            if(texto.length>0){
                $(".val").addClass("hide");
                $(".val[data-tipo*=\'"+texto+"\']").removeClass("hide");
            }
            else{
                $(".val").removeClass("hide");
            }
        })
        $(".checked").on("ifChecked",function(){
            $("#labo").show();$("#gabi").show();$("#otros").show();
            switch($(this).val()){
                case "1": $("#gabi").hide();$("#otros").hide();break;
                case "2": $("#labo").hide();$("#otros").hide();break;
                case "3": $("#labo").hide();$("#gabi").hide();break;
                case "4": $("#labo").show();$("#gabi").show();$("#otros").show();;break;
            }
        })
        $(".checkeded").on("ifChecked",function(){
            var valor=$(this).val();
            idapru(valor);
        });
        $(".checkeded").on("ifUnchecked",function(){
            var valor=$(this).val();
            vueltapru(valor);
        });
        function idapru(valor){
            $("#segcontenedor3").append($("#"+valor+""));
            $("#"+valor+"").children("[name=\'ocultar\']").removeClass("hide");
            $("#"+valor+"").prop("class","val2");
        }
        function vueltapru(valor){
            var conte=$("#"+valor+"").attr("name-titulo");
            $("#"+conte+"").append($("#"+valor+""));
            $("#"+valor+"").children("[name=\'ocultar\']").addClass("hide");
            $("#"+valor+"").prop("class","val");

        }
        $("#btnsolicitudinternacion").on("click",solicitudservicios);
        function solicitudservicios(){
            $("#estadosolicitud").val("orden");
            $("#total").removeAttr("disabled");
            $.ajax({
               url:"'.CHtml::normalizeUrl(array('SolicitudServicios/CrearSolDetSer')).'",
               type:"post",
               data:$("#solicitud-servicios-form").serialize(),
               success:function(datos){
                    darsolicitud(datos.id_solicitud_j);
                    autorizar();
                    detallesolicitud();
               }
            });
            return false;
        }
        function darsolicitud(valor){
            var lista=$(".val2");
            lista.each(function( index ) {
                $(this).children().children(".idsolicitud").val(valor);
            });
        }
        function autorizar(){
            var lista=$(".val2");
            lista.each(function( index ) {
                $(this).children().children(".autorizacion").val("autorizado");
            });
        }
        function detallesolicitud(){
            $("#solicitud-servicios-detalle-int").submit();
        }
    });
');