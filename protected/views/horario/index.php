<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['site/index'])."Pagina Principal";
$this->breadcrumbs=array(
    'Horarios',
);
?>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Crear Horario
                    </div>
                    <div class="box-body">
                        <div id="contenedoradmi">
                        <?php $this->renderPartial('_form',array('horario'=>$horario))?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Lista de Horarios Registrados
                    </div>
                    <div class="box-body">
                        <?php $this->renderPartial('listahorarios',array('listahorarios'=>$listahorarios))?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Horarios Existentes
                    </div>
                    <div class="box-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
?>
<?php Yii::app()->clientScript->registerScript('convenio_institucion','
     $("#btnhorario").on("click",function(){
        $("#horario-form").submit();
     });
     $(".btnChangeState").on("change",function(){
           $.ajax({
                url:$(this).attr("data-url"),
                type:"get"
           });
     });
     $(".btnTurnosHorario").on("click",verturnos);
     function verturnos(){
        $.ajax({
            url:$(this).attr("href"),
            type:"post",
            success:function(datos){
               $("#contenedorhorarioturno").html(datos);
               nuevoAdminitracion();
               $(".btnactualizarturno").on("click",verTutnoupdate);
            }
        });
        return false;
     }
     $("#btnTurnoHorario").on("click",crearturno);
     function crearturno(){
        $("#idTurnoHorario").val($("#idHorarioTurno").val());
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('horario/CrearTurno')).'",
            type:"post",
            data:$("#turno-form").serialize(),
            success:function(datos){
                var contenido=$("<div>").html(datos);
                if(contenido.children("#flag").val()==null){
                    $("#contenedorhorarioturno").html(datos);
                    $("#TurnoHorario").modal("hide");
                    $(".btnactualizarturno").on("click",verTutnoupdate);
                }
                else{
                    $("#contenedorTurnoHorario").html(datos);
                }
            }
        });
     }
     function nuevoAdminitracion(){
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('horario/Nuevo')).'",
            type:"post",
            success:function(datos){
               $("#contenedoradmi").html(datos);
            }
        });
     }
     $(".btnactualizarturno").on("click",verTutnoupdate);
     function verTutnoupdate(){
        $.ajax({
            url:$(this).attr("href"),
            type:"post",
            success:function(datos){
               $("#contenedorturnoHorarioupd").html(datos);
               $("#updateturnohorario").modal("show");
            }
        });
        return false;
     }
     $("#updturnohorario").on("click",apdateturnohorario);
     function apdateturnohorario(){
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('horario/ActualizarTurno')).'",
            type:"post",
            data:$("#turno-form-update").serialize(),
            success:function(datos){
                var contenido=$("<div>").html(datos);
                if(contenido.children("#flag").val()==null){
                    $("#contenedorhorarioturno").html(datos);
                    $("#updateturnohorario").modal("hide");
                    $(".btnactualizarturno").on("click",verTutnoupdate);
                }
                else{
                    $("#contenedorturnoHorarioupd").html(datos);
                }
            }
        });
     }
');