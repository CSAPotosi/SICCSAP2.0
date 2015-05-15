<div class="row">
    <div class="col-md-12">
            <?php
            $this->breadcrumbs=array(
                'Servicios'=>array('index'),
                'Create',
            );
            ?>
            <?php $this->renderPartial('_form_servicios',array())?>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Categoria de Laboratorio</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-aqua" data-target="#categorialab" data-toggle="modal">
                                <b>Nuevo</b>
                            </button>
                        </div>
                    </div>
                    <div id="contenido_cat_lab">
                        <?php $this->renderPartial('_form_cat_lab_row',array('listcalab'=>$listcalab,'var'=>0)); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Items de Categoria</h3>
                        <div class="input-group margin">
                        <input class="form-control" type="text" id="buscaitemlab" placeholder="Nombre de Item de Laboratorio">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                        </span>
                        </div>

                    </div>
                    <div class="contenedor" id="contenedor_cat_item">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="categorialab" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Registrar Categoria de Examen de Laboratorio</h4>
            </div>
            <div class="modal-body" id="contenedormodal">
                 <?php $this->renderPartial('_form_cat_lab',array('cat_lab'=>new CategoriaExLaboratorio)); ?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary pull-left" id="cat_lab">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="categorialabUpd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Actualizar Categoria de laboratorio</h4>
            </div>
            <div class="modal-body" id="contenedormodalcatUpd">

            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnUpdcatlab','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Actualizar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="itemlab" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Crear Item de Laboratorio</h4>
            </div>
            <div class="modal-body" id="contenedormodalitemlabCreate">
                <?php $this->renderPartial('_form_cat_lab_item',array('servicio'=>new Servicio,'precio'=>new PrecioServicio,'exlab'=> new ExamenLaboratorio))?>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnCrecatitemlab','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Guardar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="itemlabUpd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Actualizar Item de Laboratorio</h4>
            </div>
            <div class="modal-body" id="contenedormodalitemlabUpdate">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnUpdateitemlab','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Guardar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpditemlab','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('pruebalaboraratorio','
    $(document).ready(function(){
        cargarEventosClick();
        $(\'#cat_lab\').click(function(){
            var data=$("#categorialab-form").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CrearcategorialabAjax")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenido_cat_lab").html(datos);
                        $("#categorialab").modal("hide");
                    }
                    else{
                        $("#contenedormodal").html(datos);
                    }
                cargarEventosClick();
                }
            });
        });
        function nuevoFormcatlab(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/CrearcategorialabAjax')).'",
                type:"post",
                success:function(datos){
                    $("#contenedormodal").html(datos);
                }

            });
        }
        $("#categorialab").on("hidden.bs.modal",nuevoFormcatlab);
        function cargarEventosClick(){
            $(".btnUpdcatlab").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedormodalcatUpd").html(datos);
                    }
                });
                $("#categorialabUpd").modal("show");
                return false;
            });
            $(".btnDelcatlab").on("click",eliminarcat);
            $(".btnItematlab").on("click",itemcat);
        }
        $("#btnUpdcatlab").on("click",ajaxUpdatecatlab);
        function ajaxUpdatecatlab(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('Servicio/UpdatecategoriaAjax')).'",
                data:$("#categorialab-form-update").serialize(),
                type:"post",
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                       $("#contenido_cat_lab").html(datos);
                       $("#categorialabUpd").modal("hide");
                       cargarEventosClick();
                    }
                    else{
                       $("#contenedormodalcatUpd").html(datos);
                    }
                }
            });
        }
        function eliminarcat(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenido_cat_lab").html(datos);
                    cargarEventosClick();
                }
            });
            return false;
        }
        function itemcat(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenedor_cat_item").html(datos);
                    CargarEventosClickItem();
                }
            });
            return false;
        }
        $("#btnCrecatitemlab").on("click",clickitem);
        $("#btnUpdateitemlab").on("click",updateitem);
        function clickitem(){
        $("#cat_lab_item_campo").val($("#campo_item_cat_lab").val());
           $.ajax({
                url:"'.CHtml::normalizeUrl(array('Servicio/CreateItemlabAjax')).'",
                data:$("#form-cat-lab-item").serialize(),
                type:"post",
                success:function(datos){
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_item").html(datos);
                        $("#itemlab").modal("hide");
                        Nuevoitemlab();
                        Nuevocatlab();
                        CargarEventosClickItem();

                    }
                    else{
                    $(\'#contenedormodalitemlabCreate\').html(datos);
                    }
                }
            });
        }
        function Nuevoitemlab(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/Nuevoitemlab')).'",
                type:"post",
                success:function(datos){
                    $("#contenedormodalitemlabCreate").html(datos);
                }
            });
        }
        $("#itemlab").on("hidden.bs.modal",Nuevoitemlab);
        function Nuevocatlab(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/Nuevocatlab')).'",
                type:"post",
                success:function(datos){
                    $("#contenido_cat_lab").html(datos);
                    cargarEventosClick();
                }
            });
        }
        function CargarEventosClickItem(){
            $(".btnitemUpdcatlab").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedormodalitemlabUpdate").html(datos);
                    }
                });
                $("#itemlabUpd").modal("show");
                return false;
            });
            $(".btndeItemcatlab").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedormodalitemlabUpdate").html(datos);
                    }
                });
                $("#itemlabUpd").modal("show");
                return false;
            });
            $(".btnitemDelcatlab").on("click",function(){
                if(confirm("¿Estas seguro de eliminar este elemento?")){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedor_cat_item").html(datos);
                        Nuevocatlab();
                        CargarEventosClickItem();
                    }
                 });
                 }
                return false;
            })

        }
        function updateitem(){
            $("#cat_lab_item_campo").val($("#campo_item_cat_lab").val());
            $.ajax({
                    url:"'.CHtml::normalizeUrl(array('servicio/Upditemlabc')).'",
                    data:$("#form-upd-cat-lab-item").serialize(),
                    type:"post",
                    success:function(datos){
                    var contenido=$("<div>").html(datos);
                        if(contenido.children("#flag").val()==null){
                            $("#contenedor_cat_item").html(datos);
                            $("#itemlabUpd").modal("hide");
                            Nuevoitemlab();
                            Nuevocatlab();
                            CargarEventosClickItem();
                        }
                        else{
                            $("#contenedormodalitemlabUpdate").html(datos);
                        }
                    }
            });
            return false;
        }
        $("#buscaitemlab").on("keyup",buscarItemlab);
        function buscarItemlab(){
            var control=$(this);
            var cad=control.val();
            if(cad.length>4||cad.length==0){
                ajaxBuscaitemlab(control);
            }
        };
        function ajaxBuscaitemlab(control){
            $.ajax({
               url:"'.CHtml::normalizeUrl(array('servicio/BuscarItemlabAjax')).'",
               type:"post",
               data:{cadena:control.val(),catitem:$("#campo_item_cat_lab").val()},
               success:function(datos){
                   $("#contenedor_cat_item").html(datos);
                   CargarEventosClickItem();
               }
            });
            return false;
        }

    });
');