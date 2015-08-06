<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>

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
                <li><?php echo CHtml::link('Datos generales',['internacion/index','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Nuevo diagnostico',['qweqw']);?></li>
                <li><?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Servicios',['qweqw']);?></li>
                <li><?php echo CHtml::link('Examenes',['qweqw']);?></li>
                <li class="active"><?php echo CHtml::link('Alta',['internacion/altaMedica','id'=>$modelInternacion->id_inter]);?></li>
            </ul>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-success">
            <div class="box-body">
                <?php echo CHtml::beginForm(['internacion/altaMedica','id'=>$modelInternacion->id_inter],'post');?>
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelInternacion,'fecha_alta');?>
                        <?php echo CHtml::activeTextField($modelInternacion,'fecha_alta',['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelInternacion,'fecha_alta',['class'=>'label label-danger']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelInternacion,'tipo_alta');?>
                        <?php echo CHtml::activeDropDownList($modelInternacion,'tipo_alta',$modelInternacion->getTipoAlta(),['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelInternacion,'tipo_alta',['class'=>'label label-danger']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelInternacion,'observacion_alta');?>
                        <?php echo CHtml::activeTextArea($modelInternacion,'observacion_alta',['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelInternacion,'observacion_alta',['class'=>'label label-danger']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-success'])?>
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