<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<div class="form">


    <div class="row">
        <div class="col-md-12">

            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">
                        Crear Cuenta
                    </h3>
                </div>
                <div class="box-body">


                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'cuenta-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                    )); ?>

                        <p class="note">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($model); ?>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'codigo'); ?>
                            <?php echo $form->textField($model,'codigo',array('size'=>12,'maxlength'=>12,'class'=>'form-control','readOnly'=>'')); ?>
                            <?php echo $form->error($model,'codigo'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'nombre'); ?>
                            <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
                            <?php echo $form->error($model,'nombre'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'descripcion'); ?>
                            <?php echo $form->textArea($model,'descripcion',array('size'=>200,'maxlength'=>200,'class'=>'form-control')); ?>
                            <?php echo $form->error($model,'descripcion'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
                        </div>

                    </div>


                    <?php $this->endWidget(); ?>
                </div>
            </div>

        </div>
    </div>

</div><!-- form -->