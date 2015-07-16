<?php
/* @var $this AgendaController */
/* @var $model Cita */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_cita'); ?>
		<?php echo $form->textField($model,'id_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_cita'); ?>
		<?php echo $form->textField($model,'hora_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_cita'); ?>
		<?php echo $form->textField($model,'estado_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_paciente'); ?>
		<?php echo $form->textField($model,'id_paciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medico_consulta_servicio'); ?>
		<?php echo $form->textField($model,'medico_consulta_servicio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->