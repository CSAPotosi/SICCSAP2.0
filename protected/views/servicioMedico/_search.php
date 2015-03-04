<?php
/* @var $this ServicioMedicoController */
/* @var $model CategoriaServicio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_categoria_serv'); ?>
		<?php echo $form->textField($model,'id_categoria_serv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_categoria'); ?>
		<?php echo $form->textField($model,'nombre_categoria',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_categoria_serv'); ?>
		<?php echo $form->textField($model,'descripcion_categoria_serv',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->