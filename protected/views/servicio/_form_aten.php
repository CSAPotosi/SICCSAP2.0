<div class="row">
    <div class="col-md-12">
        <?php $this->renderPartial('_form_servicios',array())?>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3>Medico Disponibles</h3>
                    </div>
                    <div class="box-body">
                        <div id="contenedorEspecialidad">
                            <?php $this->renderPartial('_form_lista_medesp',array('medicoEspecialidadlista'=>$medicoEspecialidadlista))?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3>Servicio de Atencion Medico Disponibles</h3>
                    </div>
                    <div class="box-body">
                        <div id="contenedoratencionmedica">
                            <?php $this->renderPartial('_form_lista_servicio_atencion',array('atencionmedica'=>$atencionmedica))?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="servicioatencion" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Registrar Servicio de Atencion Medica</h4>
            </div>
            <div class="modal-body" id="contenedorservicioatencion">

            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="btncrearatencionmedica">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="updservicioatencion" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Registrar Servicio de Atencion Medica</h4>
            </div>
            <div class="modal-body" id="contenedorservicioatencionupd">

            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="btnactualizarAtencion">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('pruebagabineteatencion ','
    $(document).ready(function(){
        EventosClick();
        function EventosClick(){
            $(".btnagregarprecio").on("click",CrearServicioAtencion);
            $("#btncrearatencionmedica").on("click",enviarServicioAtencion);
            $(".btnAtencionEspecialidad").on("click",verServicioMedico);
            $("#btnactualizarAtencion").on("click",ActualizarAtencion);
            $(".btnEliminarAtencion").on("click",EliminarAtencion);
        }
        function CrearServicioAtencion(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenedorservicioatencion").html(datos);
                }
            });
            $("#servicioatencion").modal("show");
            return false;
        }
        function verServicioMedico(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenedorservicioatencionupd").html(datos);
                }
            });
            $("#updservicioatencion").modal("show");
            return false;
        }
        function enviarServicioAtencion(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/RegistrarAtencion')).'",
                data:$("#form-servicioatencion").serialize(),
                type:"post",
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#servicioatencion").modal("hide");
                        $("#contenedoratencionmedica").html(datos);
                        listEspecialidad();
                        EventosClick();
                    }
                    else{
                        $("#contenedorservicioatencion").html(datos);

                    }
                }
            });
            return false;
        }
        function listEspecialidad(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/ListarEspecialidad')).'",
                type:"post",
                success:function(datos){
                    $("#contenedorEspecialidad").html(datos);
                    EventosClick();
                }
            });
            return false;
        }
        function ActualizarAtencion(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('servicio/ActualizarAtencionMedica')).'",
                data:$("#form-servicioatencion-update").serialize(),
                type:"post",
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#updservicioatencion").modal("hide");
                        $("#contenedoratencionmedica").html(datos);
                        listEspecialidad();
                        EventosClick();
                    }
                    else{
                        $("#contenedorservicioatencionupd").html(datos);
                    }
                }
            });
        }
        function EliminarAtencion(){
            alert("kola");
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenedoratencionmedica").html(datos);
                    EventosClick();
                    listEspecialidad();

                }
            });
            return false;
        }
    });
');