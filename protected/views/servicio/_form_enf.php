<div class="row">
    <div class="col-md-12">
        <?php $this->renderPartial('_form_servicios',array())?>
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Servicios de Enfermeria</h3>
                        <div class="input-group margin">
                            <input class="form-control" type="text" id="buscaitemenf" placeholder="Servico de Enfermeria">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                        </span>
                        </div>
                    </div>
                    <div class="contenedor" id="contenedor_cat_enf">
                        <?php $this->renderPartial('_form_enfermeria_row',array('listaitemcli'=>$listaitemcli,'cat_cli_item'=>$cat_cli_item))?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="enfermeria" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Servicios de Enfermeria</h4>
            </div>
            <div class="modal-body" id="contenedorenfermeriatemodal">
                <?php $this->renderPartial('_form_clinico_ser',array('servicio'=>new Servicio,'precio'=>new PrecioServicio))?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="creenfermeria">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="enfermeriaupd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Servicios de Enfermeria</h4>
            </div>
            <div class="modal-body" id="contenedorenfermeriatemodalupd">
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="updenfermeria">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('pruebaclinico ','
    $(document).ready(function(){
        $("#creenfermeria").on("click",function(){
            $("#cat_cli_item_campo").val($("#campo_item_cat_enf").val());
            var data=$("#form-cli-item").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CrearCliItemenf")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_enf").html(datos);
                        $("#enfermeria").modal("hide");
                        cargarEventosClickSerenf();
                    }
                    else{
                        $("#contenedorenfermeriatemodal").html(datos);
                    }
                }
            });
            return false;
        });
        $("#enfermeria").on("hidden.bs.modal",NuevoClinicoForm);
        function NuevoClinicoForm(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/CrearCliItem')).'",
                type:"post",
                success:function(datos){
                    $("#contenedorenfermeriatemodal").html(datos);
                }

            });
        }
        cargarEventosClickSerenf();
        function cargarEventosClickSerenf(){
            $(".btnitemUpdcatenf").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedorenfermeriatemodalupd").html(datos);
                    }
                });
                $("#enfermeriaupd").modal("show");
                return false;
            });
            $("#updenfermeria").on("click",updateenfermeria);
            $(".btnitemDelcatcli").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedor_cat_enf").html(datos);
                        cargarEventosClickSerenf();
                    }
                });
                return false;
            });
        }
        function updateenfermeria(){
            var data=$("#form-upd-cli-item").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/Updateitemcatenf")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_enf").html(datos);
                        $("#enfermeriaupd").modal("hide");
                        cargarEventosClickSerenf();
                    }
                    else{
                        $("#contenedorenfermeriatemodalupd").html(datos);
                    }
                }
            });
        }
        $("#buscaitemenf").on("keyup",buscarItemenf);
        function buscarItemenf(){
            var control=$(this);
            var cad=control.val();
            if(cad.length>1){
                var valor=control.val();
                ajaxBuscaitemenf(valor);
            }
            if(cad.length==0){
                var valor="";
                ajaxBuscaitemenf(valor);
            }
        };
        function ajaxBuscaitemenf(valor){
            $.ajax({
               url:"'.CHtml::normalizeUrl(array('servicio/BuscarItemenfAjax')).'",
               type:"post",
               data:{cadena:valor,catitem:$("#campo_item_cat_enf").val()},
               success:function(datos){
                   $("#contenedor_cat_enf").html(datos);
                   cargarEventosClickSerenf();
               }
            });
            return false;
        }
    });
');