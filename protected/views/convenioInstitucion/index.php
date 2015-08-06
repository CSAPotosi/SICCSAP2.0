<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6"><h4>Seguros Institucionales</h4></div>
                                <div class="col-md-6">
                                    <div class="input-group pull-right">
                                        <input class="form-control" type="text" id="buscarconvenioinstitucion" placeholder="Burcar Convenio Institucionales">
                                  <span class="input-group-btn">
                                       <button class="btn btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                                  </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="contenedorlistaconveniosinsti">
                            <?php $this->renderPartial('listaConvenioInstitucion',array('listaconvenioinsti'=>$listaconvenioinsti))?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Registro de Seguro Institucional
                    </div>

                    <div class="box-body">
                        <div id="contenedorconvenioinstitucion">
                            <?php $this->renderPartial('_form',array('convenio_insti'=>$convenio_insti))?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Seguro
            </div>
            <div class="box-body">
                <div id="contenedorconvenioservicios">
                    <div class="callout callout-danger">
                        <h4>Elija Un Convenio Intitucional</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="servicioconvevenio" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Agregar Servicio a Covenio Institucional</h4>
            </div>
            <div class="modal-body">
                <div id="contenedorprincipalconvenioservicio">

                </div>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnConvenioServicio','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Guardar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpditemlab','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('convenio_institucion','
$(document).ready(function(){
    clickSelector();
    function clickSelector(){
        $("input[type=\'checkbox\'],input[type=\'radio\']").iCheck({
             checkboxClass:"icheckbox_minimal-red",
             radioClass:"iradio_minimal-blue"
        });
        $(".servicio").on("ifChecked",function(){
             var valor=$(this).val();
             seleccionado(valor);
        });
        function seleccionado(valor){
            $("#contenedor2").append($("#"+valor+""));
            $("#"+valor+"").children("[name=\'ocultar\']").removeClass("hidden");
            $("#"+valor+"").children("[name=\'datos\']").addClass("hidden");
        }
        $(".servicio").on("ifUnchecked",function(){
             var valor=$(this).val();
             deseleccionar(valor);
        });
        function deseleccionar(valor){
            $("#contenedor1").append($("#"+valor+""));
            $("#"+valor+"").children("[name=\'ocultar\']").addClass("hidden");
            $("#"+valor+"").children("[name=\'datos\']").removeClass("hidden");
        }
    }
    $("#btnConvenioServicio").on("click",CrearServicioConvenio)
    function CrearServicioConvenio(){
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('/ConvenioInstitucion/CrearConveniosServicios')).'",
            type:"post",
            data:$("#detalle-form-convenio-servicio").serialize(),
            success:function(datos){
            var contenido=$("<div>").html(datos);
                if(contenido.children("#flag").val()==null){
                    $("#contenedorconvenioservicios").html(datos);
                    $("#servicioconvevenio").modal("hide");
                    convenioServicio($("#id_convenio_servicio").val());

                }
                else{
                    $("#contenedorlistaconvenio").html(datos);
                    clickSelector();
                }
            }
        });
    }
    click();
    function click(){
        $("#btnConvenio_Insti").on("click",CrearConve_insti);
    }
    function CrearConve_insti(){
        $("#convenio-institucion-form").submit();
    }
    $("#buscarconvenioinstitucion").on("keyup",function(){
        var texto=$(this).val();
        if(texto.length>0){
            $(".valor").addClass("hide");
            $(".valor[data-nombre*=\'"+texto+"\']").removeClass("hide");
        }
        else{
            $(".valor").removeClass("hide");
        }
    });
    $(".btnConvenioServicios").on("click",function(){
      $.ajax({
        url:$(this).attr("href"),
        type:"post",
        success:function(datos){
           $("#contenedorconvenioservicios").html(datos);
           var convenio=$("#id_convenio_servicio").val();
           convenioServicio(convenio);
        }
      });
     return false;
     });
     function convenioServicio(convenio){
        $.ajax({
                url:"'.CHtml::normalizeUrl(array('ConvenioInstitucion/ListaServiciosInstitucion')).'",
                type:"post",
                data:{convenio:convenio},
                success:function(datos){
                    $("#contenedorprincipalconvenioservicio").html(datos);
                    clickSelector();
                }
            });
            return false;
     }
});
');