<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */
$model=$modelConsulta->idHistoria;
$consulta_id=$modelConsulta->id_consulta;

$this->breadcrumbs=array(
    'Pacientes'=>array('persona/index'),
    'CSA-'.$model->paciente->personapa->codigo,
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/index']).' Historia clinica - Consulta';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$model))?>

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
                    <li><?php echo CHtml::link("<i class='fa fa-list'></i> Historia clinica",array('historialPaciente/view','id'=>$model->id_historial))?></li>
                    <li><?php echo CHtml::link('<i class="fa fa-h-square"></i> Antecedentes',['consulta/viewAntecedente','hid'=>$model->id_historial]);?></li>
                    <li <?php echo ($consulta_id==0)?'class="active"':''; ?>><?php echo CHtml::link("<i class='fa fa-stethoscope'></i> Nueva consulta",array('consulta/','hid'=>$model->id_historial));?></li>
                    <li><?php echo ($model->paciente->estado_paciente!='INTERNADO')?CHtml::link("<i class='fa fa-wheelchair'></i> Nueva internacion",['internacion/createInternacion','id'=>$model->id_historial]):CHtml::link("<i class='fa fa-wheelchair'></i> Internacion actual",['internacion/index','id'=>$model->internacionActual->id_inter]); ?></li>
                    <li class="dropdown">
                        <?php echo CHtml::link('Quirofanos <span class="caret"></span>',['#'],['class'=>'dropdown-toggle animate','data-toggle'=>'dropdown']);?>
                        <ul class="dropdown-menu" role="menu">
                            <li><?php echo CHtml::link('Programar cirugia',['cirugia/programarCirugia','id_h'=>$model->id_historial]);?></li>
                            <li><?php echo CHtml::link('Registrar cirugia',['cirugia/createCirugia','id_h'=>$model->id_historial]);?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php if($consulta_id!=0):?>
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
                    <li><?php echo CHtml::link("Detalle de consulta",array('consulta/index','hid'=>$modelConsulta->idHistoria->id_historial,'cid'=>$modelConsulta->id_consulta))?></li>
                    <li class="active"><?php echo CHtml::link('Tratamiento',['consulta/viewTratamiento','consulta_id'=>$consulta_id]);?></li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif;?>


<div class="row">
    <div class="col-md-6">
        <div class="box box-solid box-primary" id="box-tratamiento">
            <div class="box-header">
                <h3 class="box-title">Tratamientos realizados</h3>
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_tableTratamiento',['listaTratamiento'=>$modelConsulta->tratamientos]);?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::button('Nuevo',['class'=>'btn btn-primary','id'=>'btnModalCreateTratamiento','data-toggle'=>'modal','data-target'=>'#modalFormTratamiento'])?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-solid box-primary" id="box-detalle-trat">
            <div class="box-header">
                <h3 class="box-title">Detalle de tratamiento</h3>
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_detalleTratamiento',['modelTratamiento'=>null]);?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalFormTratamiento" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" id="btnCreateTratamiento" class="btn btn-primary  pull-left">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalFormEvolucion" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Evolucion</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" id="btnCreateEvolucion" class="btn btn-primary  pull-left">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl."/resources/plugins/typeahead/bootstrap-typeahead.js",CClientScript::POS_END);
    Yii::app()->clientScript->registerScript('modalTratamiento','
        var newItem;

        function selectItem(item){
          $(".typeahead li.active").closest("tr").find("input[type=\'hidden\']").eq(0).val(item.value);
        }

        function agregarEventosFila(){
            $("#btn-save-receta").on("click",clickSave=function(){
                var filaActual=$(this).closest("tr");
                filaActual.children("td").last().append("<button type=\'button\' class=\'btn btn-primary btn-remove-receta\'><i class=\'fa fa-times\'></i></button>");
                var nuevo = newItem.clone();
                var indice=$(this).data("index")+1;
                var indice_ini=nuevo.find("#btn-save-receta").data("index");
                nuevo.find("input,select").each(function(){
                    $(this).attr("name",$(this).attr("name").replace("["+indice_ini+"]","["+indice+"]"));
                    $(this).attr("id",$(this).attr("id").replace("_"+indice_ini+"_","_"+indice+"_"));
                });
                nuevo.find("#btn-save-receta").data("index",indice);
                nuevo.find("#btn-save-receta").attr("data-index",indice);
                nuevo.find(".text-med").typeahead({
                        onSelect:selectItem,
                        ajax:"'.CHtml::normalizeUrl(['consulta/loadMedicamento']).'",
                        displayField:"descripcion",
                        valueField:"id_med"
                });
                $(this).closest("tbody").append(nuevo);
                $(this).remove();
                $(".btn-remove-receta").on("click",function(){
                    $(this).closest("tr").remove();
                });
                $("#btn-save-receta").on("click",clickSave);
            });

            $(".btn-remove-receta").on("click",function(){
                    $(this).closest("tr").remove();
            });
        }

        $("#btnModalCreateTratamiento").on("click",function(){
            $("#modalFormTratamiento .modal-title").text("Nuevo Tratamiento");
            $.ajax({
                url:"'.CHtml::normalizeUrl(['consulta/loadFormTratamientoAjax','id_con'=>$modelConsulta->id_consulta]).'",
                method:"post",
                success:function(datos){
                    var elem=$("#modalFormTratamiento .modal-body").html(datos);
                    newItem=elem.find("#btn-save-receta").closest("tr").clone();
                    agregarEventosFila();
                    $(".text-med").typeahead({
                        onSelect:selectItem,
                        ajax:"'.CHtml::normalizeUrl(['consulta/loadMedicamento']).'",
                        displayField:"descripcion",
                        valueField:"id_med"
                    });
                }
            });
        });

        $("#btnCreateTratamiento").on("click",function(){
            $.ajax({
                beforeSend:function(){
                    $("#box-tratamiento").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>");
                },
                url:$("#form-tratamiento").attr("action"),
                data:$("#form-tratamiento").serialize(),
                method:"post",
                success:function(datos){
                    var temp=$("<div>").append(datos);
                    if(temp.find("#form-tratamiento").length>0){
                        $("#modalFormTratamiento .modal-body").html(datos);
                        agregarEventosFila();
                        $(".text-med").typeahead({
                            onSelect:selectItem,
                            ajax:"'.CHtml::normalizeUrl(['consulta/loadMedicamento']).'",
                            displayField:"descripcion",
                            valueField:"id_med"
                        });
                    }
                    else{
                        $("#modalFormTratamiento").modal("hide");
                        $("#box-tratamiento .box-body").html(datos);
                        $("#table-tratamiento tbody tr").on("click",clickTableTratamiento).eq(0).trigger("click");

                    }
                },
                complete:function(){$("#box-tratamiento .overlay").remove();}
            });
        });

        $("#table-tratamiento tbody tr").on("click",clickTableTratamiento);
        $("#modalFormEvolucion").on("show.bs.modal",function(){
            var id=$("#btnModalCreateEvolucion").data("id_trat");
            $.ajax({
                url:"'.CHtml::normalizeUrl(['consulta/createEvolucionAjax']).'",
                data:{id_trat:id},
                method:"get",
                success:function(datos){
                    $("#modalFormEvolucion .modal-body").html(datos);
                }
            });
        });

        $("#btnCreateEvolucion").on("click",function(){
            $.ajax({
                url:$("#form-evolucion").attr("action"),
                data:$("#form-evolucion").serialize(),
                method:"post",
                success:function(datos){
                    if($("<div>").html(datos).find("#form-evolucion").length>0)
                        $("#modalFormEvolucion .modal-body").html(datos);
                    else{
                        $("#modalFormEvolucion").modal("hide");
                        $("#table-tratamiento tbody tr[data-index=\'"+datos+"\']").eq(0).trigger("click");
                    }
                }
            });
        });
        function clickTableTratamiento(){
            $("#table-tratamiento tr").removeClass("bg-blue");
            $(this).addClass("bg-blue");
            var fila=$(this);
            $.ajax({
                beforeSend:function(){
                    $("#box-detalle-trat").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>");
                },
                url:"'.CHtml::normalizeUrl(['consulta/loadDetalleTratamientoAjax']).'",
                data:{id_trat:fila.attr("data-index")},
                success:function(datos){
                    $("#box-detalle-trat .box-body").html(datos);
                    $("#modalFormEvolucion").modal("hide");
                },
                complete:function(){
                    $("#box-detalle-trat .overlay").remove();
                    $("#tools-trat").activateBox();
                    $("#tools-receta").activateBox();
                }
            });
        }

    ');
?>