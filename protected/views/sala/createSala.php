<?php echo CHtml::hiddenField('nuevaSala',($modelSala->isNewRecord)?1:0); ?>
<?php echo CHtml::beginForm(array(''),'post',array('id'=>'form-sala'));?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Los campos con <span class="required">*</span> son obligatorios.
    </div>
    <?php echo CHtml::errorSummary(array($modelSala),null,null,array('class'=>'alert alert-danger')) ; ?>
    <?php echo CHtml::activeHiddenField($modelSala,'id_sala'); ?>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelSala,'numero_sala');?>
        <?php echo CHtml::activeTextField($modelSala,'numero_sala',array('class'=>'form-control','placeholder'=>'Escribe un numero de sala')); ?>
        <?php echo CHtml::error($modelSala,'numero_sala',array('class'=>'label label-danger'));?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelSala,'ubicacion_sala');?>
        <?php echo CHtml::activeTextArea($modelSala,'ubicacion_sala',array('class'=>'form-control','placeholder'=>'Escribe un numero de sala')); ?>
        <?php echo CHtml::error($modelSala,'ubicacion_sala',array('class'=>'label label-danger'));?>
    </div>

    <?php echo CHtml::activeHiddenField($modelSala,'id_tipo_sala');?>
<?php echo CHtml::endForm();?>

