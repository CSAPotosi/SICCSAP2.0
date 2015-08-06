<?php
/* @var $this ConvenioInstitucionController */
/* @var $model ConvenioInstitucion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_convenio'); ?>
		<?php echo $form->textField($model,'id_convenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_convenio'); ?>
		<?php echo $form->textField($model,'nombre_convenio',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_insti'); ?>
		<?php echo $form->textField($model,'id_insti'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->