<?php
    $this->pageTitle='Finalizar cirugia';
?>

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