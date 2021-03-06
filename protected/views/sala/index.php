<?php
$this->breadcrumbs=array(
    'Administrar salas',
);

$this->pageTitle= CHtml::link('<i class="fa fa-arrow-left"></i>',['/']).' Servicios - Salas';

?>

<?php $this->renderPartial('/servicio/_form_servicios'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">Tipos de salas</h3>
            </div>
            <div class="box-body table-responsive" id="contenido_tipo_sala">
                <?php $this->renderPartial('_rowTipoSala',array('listaTipoSala'=>$listaTipoSala));?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Nuevo tipo',array('#'),array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modalTipoSala','id'=>'btnpruebita'));?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">Salas <small id="title-sala" class="label label-primary">Seleccione un tipo</small></h3>
            </div>
            <div class="box-body" id="contenido_sala">
                <?php $this->renderPartial('_tableSala',array('listaSala'=>$listaSala,'id_tipo_sala'=>0));?>
            </div>

            <div class="box-footer">
                <?php echo CHtml::link('Nueva sala',array('#'),array('id'=>'btnCreateSala','class'=>'btn btn-primary disabled','data-toggle'=>'modal','data-target'=>'#modalSala'));?>
            </div>
        </div>
    </div>
</div>





<div class="modal fade modal-primary" id="modalTipoSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo tipo de sala</h4>
            </div>
            <div class="modal-body" id="modal_contenedor">
                <?php $this->renderPartial('/sala/create',array('modelServicio'=>new Servicio,'modelTipoSala'=>new TipoSala,'modelPrecio'=>new PrecioServicio)); ?>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnAddTipoSala','class'=>'btn btn-outline btn-primary pull-left'),'<i class="fa fa-plus"></i> Agregar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseTipoSala','class'=>'btn btn-outline btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalUpdateTipoSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar tipo de sala</h4>
            </div>
            <div class="modal-body" id="modal_contenedorUpdate">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnUpdTipoSala','class'=>'btn btn-outline btn-primary pull-left'),'Actualizar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-outline btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalVerTipoSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalle de tipo de sala</h4>
            </div>
            <div class="modal-body" id="modal_contenedorDetalle">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-outline btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-primary" id="modalSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Sala</h4>
            </div>
            <div class="modal-body" id="modalContenedorSala">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnSala','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Agregar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalVerSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalle de sala</h4>
            </div>
            <div class="modal-body" id="modal_contenedorDetalleSala">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnCloseSala','class'=>'btn btn-outline btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>


<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScript('ajax','

  $("#popover").popover();

    cargarEventosClick();
    $("#btnAddTipoSala").on("click",ajaxConsulta);
    function ajaxConsulta(){
        var flag=true;
        $.ajax({
            beforeSend:function(){
                $(".contenedor").append($("<div class=\'overlay\'>"));
                $(".contenedor").append($("<div class=\'loading-img\'>"));
            },
            url:"'.CHtml::normalizeUrl(array('sala/createTipoSalaAjax')).'",
            type:"post",
            data:$("#form-create-tipo_sala").serialize(),
            success:function(datos){

                var contenido=$("<div>").html(datos);
                if(contenido.children("#flag").val()==null){
                    $("#contenido_tipo_sala").html(datos);
                    $("#modalTipoSala").modal("hide");
                }
                else{
                    $("#modal_contenedor").html(datos);
                }
                cargarEventosClick();
            }
        });
    }
    $("#btnUpdTipoSala").on("click",ajaxUpdateTipoSala);
    function ajaxUpdateTipoSala(){
        $.ajax({
            beforeSend:function(){
                $(".contenedor").append($("<div class=\'overlay\'>"));
                $(".contenedor").append($("<div class=\'loading-img\'>"));
            },
            url:"'.CHtml::normalizeUrl(array('sala/updateTipoSalaAjax')).'",
            data:$("#form-update-tipo_sala").serialize(),
            type:"post",
            success:function(datos){
                var contenido=$("<div>").html(datos);
                if(contenido.children("#flagUpdate").val()==null){
                    $("#contenido_tipo_sala").html(datos);
                    $("#modalUpdateTipoSala").modal("hide");
                }
                else{
                    $("#modal_contenedorUpdate").html(datos);
                }
                cargarEventosClick();
            }
        });
    }

    $(document).ajaxComplete(function(){
        $(".overlay").remove();
        $(".loading-img").remove();
    });

    function nuevoFormTipoSala(){
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('sala/create')).'",
            type:"post",
            success:function(datos){
                $("#modal_contenedor").html(datos);
            }
        });
    }
    $("#modalTipoSala").on("hidden.bs.modal",nuevoFormTipoSala);
    function cargarEventosClick(){
        $(".btnChangeStateTipoSala").bootstrapToggle();

        $(".btnChangeStateTipoSala").on("change",function(){
            $.ajax({
                url:$(this).attr("data-url"),
                type:"get",
                data:{estado:Number($(this).prop("checked"))}
            });
        });

        $(".btnVerTipoSala").on("click",function(){
            $.ajax({
                beforeSend:function(){
                    console.log("hola");
                },
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#modal_contenedorDetalle").html(datos);
                }
            });
            $("#modalVerTipoSala").modal("show");
            return false;
        });

        $(".btnUpdTipoSala").on("click",function(){
            $.ajax({
                beforeSend:function(){
                    $(".contenedor").append($("<div class=\'overlay\'>"));
                    $(".contenedor").append($("<div class=\'loading-img\'>"));
                },
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#modal_contenedorUpdate").html(datos);
                }
            });
            $("#modalUpdateTipoSala").modal("show");
            return false;
        });

        $(".btnDelTipoSala").on("click",function(){
            if(confirm("¿Estas seguro de eliminar este elemento?")){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenido_tipo_sala").html(datos);
                        cargarEventosClick();
                    }
                });
            }
            return false;
        });
        $(".btnListSala").on("click",function(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenido_sala").html(datos);
                    cargaEventosSala();
                    if($("#id_tipo_sala").val()!=0)
                        $("#btnCreateSala").removeClass("disabled");
                }
            });
            $("#title-sala").text($(this).parent("td").siblings().eq(0).text());
            return false;
        });

        $("#searchTipoSala").on("keyup",function(){
            if($(this).val().length>=3||$(this).val().length==0){
                var cadena=$(this).val().toUpperCase();
                $("#tableTipoSala tbody>tr:has(td)").addClass("hide");
                $("#tableTipoSala tbody>tr:has(td:first-child:contains("+cadena+"))").removeClass("hide");
            }
        });
    }

    function cargaEventosSala(){
        $(".btnStatusSala").popover({
            content:"contenido",
            placement:"top",
        });

        $("#searchSala").on("keyup",function(){
            var cadena=$(this).val().toUpperCase();
            $("#tableSala tbody>tr:has(td)").addClass("hide");
            $("#tableSala tbody>tr:has(td:first-child:contains("+cadena+"))").removeClass("hide");
        });

        $(".btnStatusSala").on("shown.bs.popover",function(){
            $(".changeStateSala").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    success:function(datos){
                        $("#contenido_sala").html(datos);
                        cargaEventosSala();
                    }
                });
                return false;
            });
        });

        $(".btnStatusSala").on("click",function(){ return false;});

        $(".btnUpdSala").on("click",function(){
            $("#modalSala").find(".modal-title").eq(0).text("Actualizar Sala");
            $("#btnSala").html("Actualizar");
            $.ajax({
                beforeSend:function(){
                    $(".box-salas").append($("<div class=\'overlay\'>"));
                    $(".box-salas").append($("<div class=\'loading-img\'>"));
                },
                url:$(this).attr("href"),
                success:function(datos){
                    $("#modalContenedorSala").html(datos);
                }
            });
            $("#modalSala").modal("show");
            return false;
        });

        $(".btnVerSala").on("click",function(){
            $.ajax({
                beforeSend:function(){
                    console.log("hola");
                },
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#modal_contenedorDetalleSala").html(datos);
                }
            });
            $("#modalVerSala").modal("show");
            return false;
        });
    }

    $("#btnCreateSala").on("click",function(){
        $("#btnSala").html("<i class=\"fa fa-plus\"></i> Agregar");
        $("#modalSala").find(".modal-title").eq(0).text("Nueva Sala");
        $.ajax({
            beforeSend:function(){
                $(".box-salas").append($("<div class=\'overlay\'>"));
                $(".box-salas").append($("<div class=\'loading-img\'>"));
            },
            url:"'.CHtml::normalizeUrl(array('sala/renderFormSalaAjax')).'",
            data:{id_tipo_sala:$("#id_tipo_sala").val()},
            success:function(datos){
                $("#modalContenedorSala").html(datos);
            }
        });
    });

    $("#btnSala").on("click",function(){
        if($("#nuevaSala").val()==1){
            $.ajax({

                beforeSend:function(){
                    $(".box-salas").append($("<div class=\'overlay\'>"));
                    $(".box-salas").append($("<div class=\'loading-img\'>"));
                },
                url:"'.CHtml::normalizeUrl(array('sala/createSalaAjax')).'",
                type:"post",
                data:$("#form-sala").serialize(),
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.find("#nuevaSala").length)
                        $("#modalContenedorSala").html(datos);
                    else{
                        $("#contenido_sala").html(datos);
                        cargaEventosSala();
                        $("#modalSala").modal("hide");
                    }
                }
            });
        }
        else{
            $.ajax({
                beforeSend:function(){
                    $(".box-salas").append($("<div class=\'overlay\'>"));
                    $(".box-salas").append($("<div class=\'loading-img\'>"));
                },
                url:"'.CHtml::normalizeUrl(array('sala/updateSalaAjax')).'",
                type:"post",
                data:$("#form-sala").serialize(),
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.find("#nuevaSala").length)
                        $("#modalContenedorSala").html(datos);
                    else{
                        $("#contenido_sala").html(datos);
                        cargaEventosSala();
                        $("#modalSala").modal("hide");
                    }
                }
            });
        }
    });
',CClientScript::POS_END);
?>
