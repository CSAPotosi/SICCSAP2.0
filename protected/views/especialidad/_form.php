<?php
/* @var $this EspecialidadController */
/* @var $model Especialidad */
/* @var $form CActiveForm */
?>

<div class="form" >

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'especialidad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

	<div class="form-group">
		<?php echo CHtml::activelabelEx($model,'nombre_especialidad',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo CHtml::textField($model,'nombre_especialidad',array('class'=>'form-control','placeholder'=>'nombre_especialidad')); ?>
		</div>
		<?php echo CHtml::error($model,'nombre_especialidad',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::labelEx($model,'descripcion',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo CHtml::textField($model,'descripcion',array('class'=>'form-control','placeholder'=>'descripcion')); ?>
		</div>
		<?php echo CHtml::error($model,'descripcion',array('class'=>'label label-danger')); ?>
	</div>

</div>
	<div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
                
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->