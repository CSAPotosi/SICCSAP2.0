

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'sala-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
    <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary(array($itemSala),null,null,array('class'=>'alert alert-error')); ?>

    <div class="form-group">
        <?php echo $form->labelEx($itemSala,'numero_sala',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($itemSala,'numero_sala',array('class'=>'form-control','placeholder'=>'Escribe un numero para la sala')); ?>
        </div>
        <?php echo $form->error($itemSala,'numero_sala',array('class'=>'label label-danger')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($itemSala,'ubicacion_sala',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textArea($itemSala,'ubicacion_sala',array('class'=>'form-control','placeholder'=>'Escribe la ubicacion de la sala')); ?>
        </div>
        <?php echo $form->error($itemSala,'ubicacion_sala',array('class'=>'label label-danger')); ?>
    </div>

    <?php echo $form->hiddenField($itemSala,'id_tipo_sala'); ?>
</div>
<div class="box-footer">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton($itemSala->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>

        </div>
    </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->