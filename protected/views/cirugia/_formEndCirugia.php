<?php
$model=$modelCirugia->historial;
$this->breadcrumbs=array(
    'Pacientes'=>array('persona/index'),
    'CSA-'.$model->paciente->personapa->codigo,
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/index']).' Historia clinica - Finalizar cirugias';
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
                    <li><?php echo CHtml::link("<i class='fa fa-stethoscope'></i> Nueva consulta",array('consulta/','hid'=>$model->id_historial));?></li>
                    <li><?php echo ($model->paciente->estado_paciente!='INTERNADO')?CHtml::link("<i class='fa fa-wheelchair'></i> Nueva internacion",['internacion/createInternacion','id'=>$model->id_historial]):CHtml::link("<i class='fa fa-wheelchair'></i> Internacion actual",['internacion/index','id'=>$model->internacionActual->id_inter]); ?></li>
                    <li class="dropdown active">
                        <?php echo CHtml::link('Quirofanos <span class="caret"></span>',['#'],['class'=>'dropdown-toggle animate','data-toggle'=>'dropdown']);?>
                        <ul class="dropdown-menu" role="menu">
                            <li class="active"><?php echo CHtml::link('Programar cirugia',['cirugia/programarCirugia','id_h'=>$model->id_historial]);?></li>
                            <li><?php echo CHtml::link('Registrar cirugia',['cirugia/createCirugia','id_h'=>$model->id_historial]);?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="box box-solid box-primary">
    <div class="box-body">
        <?php echo CHtml::beginForm(['cirugia/finCirugia','id_c'=>$modelCirugia->id_c]);?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Los campos con <span class="required">*</span> son obligatorios.
        </div>
        <?php echo CHtml::errorSummary(array($modelCirugia),'Corriga los siguientes problemas para continuar:',null,array('class'=>'alert alert-danger')) ; ?>

        <?php echo CHtml::activeHiddenField($modelCirugia,'id_c');?>
        <?php echo CHtml::activeHiddenField($modelCirugia,'estado_cirugia',['value'=>'FINALIZADA']);?>
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'fecha_hora_sal');?>
            <?php echo CHtml::activeTextField($modelCirugia,'fecha_hora_sal',['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'fecha_hora_sal',['class'=>'label label-danger']);?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'detalle_instru');?>
            <?php echo CHtml::activeTextArea($modelCirugia,'detalle_instru',['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'detalle_instru',['class'=>'label label-danger']);?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'tipo_anestesia');?>
            <?php echo CHtml::activeDropDownList($modelCirugia,'tipo_anestesia',$modelCirugia->getTipoAnestesia(),['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'tipo_anestesia',['class'=>'label label-danger']);?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'diagnostico_post_q');?>
            <?php echo CHtml::activeTextArea($modelCirugia,'diagnostico_post_q',['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'diagnostico_post_q',['class'=>'label label-danger']);?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php echo CHtml::endForm();?>
    </div>
</div>



<?php
Yii::app()->clientScript->registerScript('eventos','
    $("#Cirugia_fecha_hora_sal").datetimepicker({
        locale:"es",
        defaultDate:new Date(),
        format:"YYYY-MM-DD HH:mm",
        minDate:"'.date('m/d/Y',strtotime('+0 day')).'"
    });
');
?>