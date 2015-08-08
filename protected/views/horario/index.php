<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Crear Horario
                    </div>
                    <div class="box-body">
                        <?php $this->renderPartial('_form',array('horario'=>$horario))?>
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
                        Turnos Registrados
                    </div>
                    <div class="box-body">
                        <div id="contenedorhorarioturno">
                            <div class="callout callout-danger">
                                <h4>Elija Un Horario</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="TurnoHorario" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Registrar Turno</h4>
            </div>
            <div class="modal-body"">
            <div id="contenedorTurnoHorario">
                <?php $this->renderPartial('form_turno',array('turno'=>$turno))?>
            </div>
        </div>
        <div class="modal-footer clearfix">
            <?php echo CHtml::tag('button',array('id'=>'btnTurnoHorario','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Guardar',true)?>
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
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
                }
                else{
                    $("#contenedorTurnoHorario").html(datos);
                }
            }
        });
     }
');