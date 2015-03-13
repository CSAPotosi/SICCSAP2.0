<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'sala-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
    <p class="callout callout-danger">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary(array($itemSala),null,null,array('class'=>'alert alert-danger')); ?>

    <div class="form-group">
        <?php echo $form->labelEx($itemSala,'numero_sala'); ?>
        <?php echo $form->textField($itemSala,'numero_sala',array('class'=>'form-control','placeholder'=>'Escribe un numero para la sala')); ?>
        <?php echo $form->error($itemSala,'numero_sala',array('class'=>'label label-danger')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($itemSala,'ubicacion_sala'); ?>
        <?php echo $form->textArea($itemSala,'ubicacion_sala',array('class'=>'form-control','placeholder'=>'Escribe la ubicacion de la sala')); ?>
        <?php echo $form->error($itemSala,'ubicacion_sala',array('class'=>'label label-danger')); ?>
    </div>

    <?php echo $form->hiddenField($itemSala,'id_tipo_sala'); ?>
</div>
<div class="box-footer">
    <div class="form-group">
        <?php echo CHtml::submitButton($itemSala->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->