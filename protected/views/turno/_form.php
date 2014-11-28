<div class="col-md-10" style="border: solid 1px">

<?php
/* @var $this TurnoController */
/* @var $model Turno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nombre_turno',array('class'=>'col-md-2 ')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($model,'nombre_turno',array('class'=>'form-control','placeholder'=>'asdasdasd')); ?>
        </div>
        <?php echo $form->error($model,'nombre_turno',array('class'=>'label label-success')); ?>
    </div>



		<?php echo $form->labelEx($model,'tipo_turno'); ?>
		<?php echo $form->textField($model,'tipo_turno',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'tipo_turno'); ?>



		<?php echo $form->labelEx($model,'hora_ingreso'); ?>
		<?php echo $form->textField($model,'hora_ingreso'); ?>
		<?php echo $form->error($model,'hora_ingreso'); ?>



		<?php echo $form->labelEx($model,'hora_salida'); ?>
		<?php echo $form->textField($model,'hora_salida'); ?>
		<?php echo $form->error($model,'hora_salida'); ?>



		<?php echo $form->labelEx($model,'tolerancia'); ?>
		<?php echo $form->textField($model,'tolerancia'); ?>
		<?php echo $form->error($model,'tolerancia'); ?>



		<?php echo $form->labelEx($model,'id_horario'); ?>
		<?php echo $form->textField($model,'id_horario'); ?>
		<?php echo $form->error($model,'id_horario'); ?>



		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn-lg col-sm-3')); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->

</div>