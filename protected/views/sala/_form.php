<?php
/* @var $this SalaController */
/* @var $model TipoSala */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-sala-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,

)); ?>
<div class="box-body">
    <p class="callout callout-danger">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary(array($model,$modelCosto),null,null,array('class'=>'alert alert-danger')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre_tipo_sala'); ?>
		<?php echo $form->textField($model,'nombre_tipo_sala',array('class'=>'form-control','placeholder'=>'Escribe el nombre del tipo de sala')); ?>
		<?php echo $form->error($model,'nombre_tipo_sala',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion_tipo_sala'); ?>
		<?php echo $form->textArea($model,'descripcion_tipo_sala',array('class'=>'form-control','placeholder'=>'Escribe una breve descripcion')); ?>
		<?php echo $form->error($model,'descripcion_tipo_sala',array('class'=>'label label-danger')); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($modelCosto,'monto'); ?>
        <div class="input-group">
            <span class="input-group-addon"><b>Bs.-</b></span>
            <?php echo $form->textField($modelCosto,'monto',array('class'=>'form-control','placeholder'=>'0.00')); ?>
        </div>
        <?php echo $form->error($modelCosto,'monto',array('class'=>'label label-danger')); ?>
    </div>
</div>
	<div class="box-footer">
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
        </div>

    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->