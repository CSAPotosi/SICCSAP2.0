<?php
/* @var $this SalaController */
/* @var $model TipoSala */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_sala'); ?>
		<?php echo $form->textField($model,'id_tipo_sala'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_tipo_sala'); ?>
		<?php echo $form->textField($model,'nombre_tipo_sala',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_tipo_sala'); ?>
		<?php echo $form->textField($model,'descripcion_tipo_sala',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->