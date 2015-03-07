<?php
/* @var $this ServicioMedicoController */
/* @var $model CategoriaServicio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoria-servicio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
	<p class="callout callout-info">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre_categoria'); ?>
		<?php echo $form->textField($model,'nombre_categoria',array('class'=>'form-control','placeholder'=>'Escribe un nombre para la categoria')); ?>
		<?php echo $form->error($model,'nombre_categoria',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion_categoria_serv'); ?>
		<?php echo $form->textArea($model,'descripcion_categoria_serv',array('class'=>'form-control','placeholder'=>'Escribe una breve descripcion')); ?>
		<?php echo $form->error($model,'descripcion_categoria_serv',array('class'=>'label label-danger')); ?>
	</div>

</div>
	<div class="box-footer">
        <div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->