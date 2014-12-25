<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historial-paciente-form',
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
		<?php echo $form->labelEx($model,'id',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'id',array('class'=>'form-control','placeholder'=>'id')); ?>
		</div>
		<?php echo $form->error($model,'id',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ocupacion_paciente',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'ocupacion_paciente',array('class'=>'form-control','placeholder'=>'ocupacion_paciente')); ?>
		</div>
		<?php echo $form->error($model,'ocupacion_paciente',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'grupo_sanguineo_paciente',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'grupo_sanguineo_paciente',array('class'=>'form-control','placeholder'=>'grupo_sanguineo_paciente')); ?>
		</div>
		<?php echo $form->error($model,'grupo_sanguineo_paciente',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tipo_paciente',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'tipo_paciente',array('class'=>'form-control','placeholder'=>'tipo_paciente')); ?>
		</div>
		<?php echo $form->error($model,'tipo_paciente',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_muerte',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'fecha_muerte',array('class'=>'form-control','placeholder'=>'fecha_muerte')); ?>
		</div>
		<?php echo $form->error($model,'fecha_muerte',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_creacion',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'fecha_creacion',array('class'=>'form-control','placeholder'=>'fecha_creacion')); ?>
		</div>
		<?php echo $form->error($model,'fecha_creacion',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_actualizacion',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'fecha_actualizacion',array('class'=>'form-control','placeholder'=>'fecha_actualizacion')); ?>
		</div>
		<?php echo $form->error($model,'fecha_actualizacion',array('class'=>'label label-danger')); ?>
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