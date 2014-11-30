<?php
/* @var $this TurnoController */
/* @var $model Turno */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_turno'); ?>
		<?php echo $form->textField($model,'id_turno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_turno'); ?>
		<?php echo $form->textField($model,'nombre_turno',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_turno'); ?>
		<?php echo $form->textField($model,'tipo_turno',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_ingreso'); ?>
		<?php echo $form->textField($model,'hora_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_salida'); ?>
		<?php echo $form->textField($model,'hora_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tolerancia'); ?>
		<?php echo $form->textField($model,'tolerancia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_horario'); ?>
		<?php echo $form->textField($model,'id_horario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->