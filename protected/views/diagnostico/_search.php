<?php
/* @var $this DiagnosticoController */
/* @var $model Diagnostico */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_diagnostico'); ?>
		<?php echo $form->textField($model,'id_diagnostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_diagnostico'); ?>
		<?php echo $form->textField($model,'fecha_diagnostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sintomas'); ?>
		<?php echo $form->textArea($model,'sintomas',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diagnostico'); ?>
		<?php echo $form->textArea($model,'diagnostico',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tratamiento'); ?>
		<?php echo $form->textArea($model,'tratamiento',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_historia'); ?>
		<?php echo $form->textField($model,'id_historia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->