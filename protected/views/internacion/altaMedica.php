<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?php echo CHtml::beginForm(['internacion/altaMedica','id'=>$modelInternacion->id_inter],'post');?>
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelInternacion,'fecha_alta');?>
                        <?php echo CHtml::activeTextField($modelInternacion,'fecha_alta',['class'=>'form-control']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelInternacion,'tipo_alta');?>
                        <?php echo CHtml::activeDropDownList($modelInternacion,'tipo_alta',$modelInternacion->getTipoAlta(),['class'=>'form-control']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelInternacion,'observacion_alta');?>
                        <?php echo CHtml::activeTextArea($modelInternacion,'observacion_alta',['class'=>'form-control']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-primary'])?>
                    </div>
                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>




<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/moment.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/bootstrap-datetimepicker.min.js',CClientScript::POS_END);

Yii::app()->clientScript->registerScript('datetime','
    $(function(){
        $("#Internacion_fecha_alta").datetimepicker({
        	locale:"es",
        	defaultDate:new Date(),
        	format:"DD-MM-YYYY HH:mm",
        	maxDate:"'.date('m/d/Y',strtotime('+1 day')).'"
        });
    });
',CClientScript::POS_END);
?>