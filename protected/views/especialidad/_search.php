<?php
/* @var $this EspecialidadController */
/* @var $model Especialidad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_especialidad'); ?>
		<?php echo $form->textField($model,'id_especialidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_especialidad'); ?>
		<?php echo $form->textField($model,'nombre_especialidad',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->