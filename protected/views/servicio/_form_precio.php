<?php
/* @var $this ServicioController */
/* @var $model Servicio */
/* @var $form CActiveForm */
?>
<div class="col-md-6">
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'servicio-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <div class="box-body">
            <?php echo $form->errorSummary($precio,null,null,array('class'=>'alert alert-error')); ?>
            <div class="form-group">
                <?php echo $form->textField($precio,'fecha_inicio',array('class'=>'form-control','placeholder'=>'Fecha Inicio')); ?>
                <?php echo $form->error($precio,'fecha_inicio',array('class'=>'label label-danger')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($precio,'fecha_fin'); ?>
                <?php echo $form->textField($precio,'fecha_fin',array('class'=>'form-control','placeholder'=>'Fecha Fin')); ?>
                <?php echo $form->error($precio,'fecha_fin',array('class'=>'label label-danger')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($precio,'Monto'); ?>
                <?php echo $form->textField($precio,'monto',array('class'=>'form-control','placeholder'=>'Monto')); ?>
                <?php echo $form->error($precio,'monto',array('class'=>'label label-danger')); ?>
            </div>
        </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php echo CHtml::submitButton($precio->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
