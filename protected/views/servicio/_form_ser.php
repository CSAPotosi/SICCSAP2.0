<div class="row">
    <div class="col-md-12">
        <?php $this->renderPartial('_form_servicios',array())?>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Servicio Clinico</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-aqua" data-target="#clinico" data-toggle="modal">
                                <b>Nuevo</b>
                            </button>
                        </div>
                    </div>
                    <div id="contenido_clinico">
                        <?php $this->renderPartial('_form_clinico_row',array('listclinico'=>$listclinico)); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Item de Servicio Clinico</h3>
                        <div class="input-group margin">
                            <input class="form-control" type="text" id="buscaitemcli" placeholder="Item de Examen de gabinete">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                        </span>
                        </div>

                    </div>
                    <div class="contenedor" id="contenedor_cat_cli">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="clinico" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Examenes de Gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorclinicotemodal">
                <?php $this->renderPartial('_form_clinico',array('clinico'=>new CategoriaServicioClinico())); ?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="CreClinico">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="clinicoupd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Examenes de Gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorclinicotemodalupd">

            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="UpdClinico">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="clinicoseritem" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Item Servicio Clinico</h4>
            </div>
            <div class="modal-body" id="contenedorclinicotemodalcreitem">
                <?php $this->renderPartial('_form_clinico_ser',array('servicio'=>new Servicio,'precio'=>new PrecioServicio))?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="CreClinicoitem">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="clinicoseritemupd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Item Servicio Clinico</h4>
            </div>
            <div class="modal-body" id="contenedorclinicotemodalupditem">
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="updClinicoitem">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('pruebaclinico ','
    $(document).ready(function(){
        cargarEventosClickSer();
        $(\'#CreClinico\').click(function(){
            var data=$("#clinico-form").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CrearclinicoAjax")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenido_clinico").html(datos);
                        $("#clinico").modal("hide");
                    }
                    else{
                        $("#contenedorclinicotemodal").html(datos);
                    }
                }
            });
        });
        $("#clinico").on("hidden.bs.modal",nuevoFormcatcli);
        function nuevoFormcatcli(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/CrearclinicoAjax')).'",
                type:"post",
                success:function(datos){
                    $("#contenedorclinicotemodal").html(datos);
                    cargarEventosClickSer();
                }
            });
        }
        function cargarEventosClickSer(){
            $(".btnUpdcli").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedorclinicotemodalupd").html(datos);
                        cargarEventosClickSer()
                    }
                });
                $("#clinicoupd").modal("show");
                return false;
            });
            $("#UpdClinico").on("click",updatecli);
            $(".btnDelcli").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenido_clinico").html(datos);
                        cargarEventosClickSer();
                    }
                });
                return false;
            });
            $(".btnItemcli").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedor_cat_cli").html(datos);
                        cargarEventosClickSerItem();
                    }
                });
                return false;
            });
        }
        function updatecli(){
            var data=$("#clinico-form-update").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/Updatecli")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenido_clinico").html(datos);
                        $("#clinicoupd").modal("hide");
                        cargarEventosClickSer();
                    }
                    else{
                        $("#contenedorclinicotemodalupd").html(datos);
                    }
                }
            });
        }
        $("#CreClinicoitem").on("click",function(){
            $("#cat_cli_item_campo").val($("#campo_item_cat_cli").val());
            var data=$("#form-cli-item").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CrearCliItem")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_cli").html(datos);
                        $("#clinicoseritem").modal("hide");
                        NuevoClinicoRow();
                        cargarEventosClickSerItem();

                    }
                    else{
                        $("#contenedorclinicotemodalcreitem").html(datos);
                    }
                }
            });
            return false;
        });
        function NuevoClinicoRow(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/NueCliRow')).'",
                type:"post",
                success:function(datos){
                    $("#contenido_clinico").html(datos);
                    cargarEventosClickSer();
                }

            });
        }
        cargarEventosClickSerItem();
        function NuevoClinicoForm(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/CrearCliItem')).'",
                type:"post",
                success:function(datos){
                    $("#contenedorclinicotemodalcreitem").html(datos);
                }

            });
        }
        $("#clinicoseritem").on("hidden.bs.modal",NuevoClinicoForm);
        function cargarEventosClickSerItem(){
            $(".btnitemUpdcatcli").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedorclinicotemodalupditem").html(datos);
                    }
                });
                $("#clinicoseritemupd").modal("show");
                return false;
            });
            $("#updClinicoitem").on("click",updatecliseritem);
            $(".btnitemDelcatcli").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedor_cat_cli").html(datos);
                        cargarEventosClickSerItem();
                        NuevoClinicoRow();
                    }
                });
                return false;
            })
        }
        function updatecliseritem(){
            var data=$("#form-upd-cli-item").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/Updateitemcatcli")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_cli").html(datos);
                        $("#clinicoseritemupd").modal("hide");
                        cargarEventosClickSerItem();
                    }
                    else{
                        $("#contenedorclinicotemodalupditem").html(datos);
                    }
                }
            });
        }
        $("#buscaitemcli").on("keyup",buscarItemcli);
        function buscarItemcli(){
            var control=$(this);
            var cad=control.val();
            if(cad.length>1){
                var valor=control.val();
                ajaxBuscaitemcli(valor);
            }
            if(cad.length==0){
                var valor="";
                ajaxBuscaitemcli(valor);
            }
        };
        function ajaxBuscaitemcli(valor){
            $.ajax({
               url:"'.CHtml::normalizeUrl(array('servicio/BuscarItemcliAjax')).'",
               type:"post",
               data:{cadena:valor,catitem:$("#campo_item_cat_cli").val()},
               success:function(datos){
                   $("#contenedor_cat_cli").html(datos);
                   cargarEventosClickSerItem();
               }
            });
            return false;
        }
    });
');