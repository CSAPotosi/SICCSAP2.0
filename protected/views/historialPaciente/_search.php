<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ocupacion_paciente'); ?>
		<?php echo $form->textField($model,'ocupacion_paciente',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grupo_sanguineo_paciente'); ?>
		<?php echo $form->textField($model,'grupo_sanguineo_paciente',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_paciente'); ?>
		<?php echo $form->textField($model,'tipo_paciente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_muerte'); ?>
		<?php echo $form->textField($model,'fecha_muerte'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_actualizacion'); ?>
		<?php echo $form->textField($model,'fecha_actualizacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->