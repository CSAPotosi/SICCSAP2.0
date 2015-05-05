<?php
$this->breadcrumbs=array(
    'Salas',
);
?>
<?php $this->renderPartial('/servicio/_form_servicios'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tipos de Sala</h3>
            </div>
            <div class="box-body" id="contenido_tipo_sala">
                <?php $this->renderPartial('_rowTipoSala',array('listaTipoSala'=>$listaTipoSala));?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Nuevo',array('#'),array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modalTipoSala','id'=>'btnpruebita'));?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Salas existentes</h3>
            </div>
            <div class="box-body">
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="modalTipoSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Tipo</h4>
            </div>
            <div class="modal-body" id="modal_contenedor">
                <?php $this->renderPartial('/sala/create',array('modelServicio'=>new Servicio,'modelTipoSala'=>new TipoSala,'modelPrecio'=>new PrecioServicio)); ?>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnAddTipoSala','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Agregar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdateTipoSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Tipo</h4>
            </div>
            <div class="modal-body" id="modal_contenedorUpdate">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnUpdTipoSala','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Actualizar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVerTipoSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalle de Tipo</h4>
            </div>
            <div class="modal-body" id="modal_contenedorDetalle">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>

<?php
Yii::app()->clientScript->registerScript('ajax','
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
                $("#modal_contenedorUpdate").html(datos);
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
            alert("cerrar");
            return false;
        });
    }


',CClientScript::POS_END);
?>
