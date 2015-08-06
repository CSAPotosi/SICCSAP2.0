<?php echo CHtml::beginForm(["consulta/createEvolucionAjax"],"post",["id"=>"form-evolucion"]);?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Los datos marcados con <b>*</b> son obligatorios.
    </div>

    <?php echo CHtml::errorSummary($modelEvo,'Para poder continuar debe corregir los siguientes problemas:',null,['class'=>'alert alert-danger']);?>
    <?php echo CHtml::activeHiddenField($modelEvo,'id_trat');?>
    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelEvo,'estado_paciente');?>
        <?php echo CHtml::activeTextField($modelEvo,'estado_paciente',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelEvo,'estado_paciente',['class'=>'label label-danger'])?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelEvo,'exploracion_evo');?>
        <?php echo CHtml::activeTextArea($modelEvo,'exploracion_evo',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelEvo,'exploracion_evo',['class'=>'label label-danger'])?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelEvo,'recomendaciones_evo');?>
        <?php echo CHtml::activeTextArea($modelEvo,'recomendaciones_evo',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelEvo,'recomendaciones_evo',['class'=>'label label-danger'])?>
    </div>
<?php echo CHtml::endForm();?>