<?php
    $this->pageTitle="Formulario de internacion";

    $this->breadcrumbs=array(
        'a','b'
    );
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$model));?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?php echo CHtml::beginForm();?>

                <div class="form-group">
                    <?php echo CHtml::label('Sala','NumSala');?>
                    <div class="input-group">
                        <?php echo CHtml::textField('NumSala',null,['class'=>'form-control disabled','placeholder'=>'Elija una sala','disabled'=>'disabled']);?>
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="button" data-toggle='modal' data-target='#modalViewSala'>Elegir sala</button>
                        </span>
                    </div>
                </div>

                <?php echo CHtml::activeHiddenField($modelInternacion,'id_historial');?>

                <div class="form-group">
                    <?php echo CHtml::activeLabel($modelInternacion,'fecha_ingreso');?>
                    <?php echo CHtml::activeTextField($modelInternacion,'fecha_ingreso',['class'=>'form-control']); ?>
                    <?php echo CHtml::error($modelInternacion,'fecha_ingreso',array('class'=>'label label-danger'));?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::activeLabel($modelInternacion,'motivo_ingreso');?>
                    <?php echo CHtml::activeDropDownList($modelInternacion,'motivo_ingreso',Internacion::model()->getMotivo(),['class'=>'form-control']);?>
                    <?php echo CHtml::error($modelInternacion,'motivo_ingreso',array('class'=>'label label-danger'));?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::activeLabel($modelInternacion,'observacion_ingreso');?>
                    <?php echo CHtml::activeTextArea($modelInternacion,'observacion_ingreso',['class'=>'form-control']); ?>
                    <?php echo CHtml::error($modelInternacion,'observacion_ingreso',array('class'=>'label label-danger'));?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::activeLabel($modelInternacion,'procedencia_ingreso');?>
                    <?php echo CHtml::activeDropDownList($modelInternacion,'procedencia_ingreso',Internacion::model()->getProcedencia(),['class'=>'form-control']);?>
                    <?php echo CHtml::error($modelInternacion,'procedencia_ingreso',array('class'=>'label label-danger'));?>
                </div>

                <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-primary'])?>
                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalViewSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Elige una sala</h4>
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









<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/moment.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/bootstrap-datetimepicker.min.js',CClientScript::POS_END);

Yii::app()->clientScript->registerScript('datetime','
    $(function(){
        $("#Internacion_fecha_ingreso").datetimepicker({
        	locale:"es",
        	defaultDate:new Date(),
        	format:"DD-MM-YYYY HH:mm",
        	maxDate:"'.date('m/d/Y',strtotime('+1 day')).'"
        });
    });
',CClientScript::POS_END);
?>

<?php
    Yii::app()->clientScript->registerScript('mostrarSala','
        $("#modalViewSala").on("show.bs.modal",ajaxMostrarSala);
        $("#tipoSala").on("change",ajaxMostrarSala);
        function ajaxMostrarSala(){

            $.ajax({
                url:"'.CHtml::normalizeUrl(array('sala/viewSalaAjax')).'",
                data:{id:$("#tipoSala").val()},
                success:function(datos){
                    $("#modalContenedorSala").html(datos);
                    $("#tipoSala").on("change",ajaxMostrarSala);
                    $(".small-box").on("click",clickSala);
                }
            });
        }

        function clickSala(){
            if($(this).hasClass("disabled")==false){
                $(".small-box").find(".check").children(".salaSelect").remove();
                var ele=$(this).find(".check");
                $(".id_sala").removeClass("selectedSala");
                ele.find(".id_sala").addClass("selectedSala");
                ele.append(\'<h3 class="salaSelect"><i class="fa fa-check-circle"></i></h3>\');
            }
        }

        $("#btnSala").on("click",function(){
            if($(".selectedSala").length>0){
                $("#NumSala").val($(".selectedSala").attr("data-sala"));
                $("label[for=\'NumSala\']").text($(".selectedSala").attr("data-tipo"));
                var idSala=$(".selectedSala").val();
                $(".Sala_id_sala").remove();
                if(idSala!=0){
                    var input=$("<input name=\'Sala[id_sala]\' class=\'Sala_id_sala\' type=\'hidden\'>")
                    input.val(idSala);
                    $("form").append(input);
                }
            }
            $("#modalViewSala").modal("hide");
        });
    ');
?>