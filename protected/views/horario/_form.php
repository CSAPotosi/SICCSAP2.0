<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'horario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
    <div class="box-body">
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model,'nombre_horario',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($model,'nombre_horario',array('class'=>'form-control','placeholder'=>'Escribe un nombre para el horario')); ?>
            </div>
            <?php echo $form->error($model,'nombre_horario',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'tipo_horario',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->dropDownList($model,'tipo_horario',$model->getTipoHorario(),array('class'=>'form-control','placeholder'=>'Escribe un nombre para el horario')); ?>
            </div>
            <?php echo $form->error($model,'tipo_horario',array('class'=>'label label-danger')); ?>
        </div>


        <?php echo $form->labelEx($model,'estado'); ?>
        <?php echo $form->textField($model,'estado',array('size'=>16,'maxlength'=>16)); ?>
        <?php echo $form->error($model,'estado'); ?>
    </div>


    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </div>




<?php $this->endWidget(); ?>

</div><!-- form -->