<?php
/* @var $this DiagnosticoController */
/* @var $model Diagnostico */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diagnostico-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_diagnostico',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'fecha_diagnostico',array('class'=>'form-control','placeholder'=>'fecha_diagnostico')); ?>
		</div>
		<?php echo $form->error($model,'fecha_diagnostico',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sintomas',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'sintomas',array('class'=>'form-control','placeholder'=>'sintomas')); ?>
		</div>
		<?php echo $form->error($model,'sintomas',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'diagnostico',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'diagnostico',array('class'=>'form-control','placeholder'=>'diagnostico')); ?>
		</div>
		<?php echo $form->error($model,'diagnostico',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tratamiento',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'tratamiento',array('class'=>'form-control','placeholder'=>'tratamiento')); ?>
		</div>
		<?php echo $form->error($model,'tratamiento',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'observaciones',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'observaciones',array('class'=>'form-control','placeholder'=>'observaciones')); ?>
		</div>
		<?php echo $form->error($model,'observaciones',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_historia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'id_historia',array('class'=>'form-control','placeholder'=>'id_historia')); ?>
		</div>
		<?php echo $form->error($model,'id_historia',array('class'=>'label label-danger')); ?>
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