<?php
/* @var $this CitaController */
/* @var $model Cita */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cita-form',
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
		<?php echo $form->labelEx($model,'id_historial',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'id_historial',array('class'=>'form-control','placeholder'=>'id_historial')); ?>
		</div>
		<?php echo $form->error($model,'id_historial',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textArea($model,'descripcion',array('class'=>'form-control','placeholder'=>'descripcion')); ?>
		</div>
		<?php echo $form->error($model,'descripcion',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tipo_cita',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->dropDownList($model,'tipo_cita',array('1'=>'Consulta General','2'=>'Consulta de Especialidad')); ?>
		</div>
		<?php echo $form->error($model,'tipo_cita',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nota_cita',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textArea($model,'nota_cita',array('class'=>'form-control','placeholder'=>'nota_cita')); ?>
		</div>
		<?php echo $form->error($model,'nota_cita',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->dateField($model,'fecha',array('class'=>'form-control','placeholder'=>'fecha')); ?>
		</div>
		<?php echo $form->error($model,'fecha',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hora',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">

			<?php echo $form->timeField($model,'hora',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'hora',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'duracion',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->timeField($model,'duracion',array('class'=>'form-control','placeholder'=>'duracion')); ?>
		</div>
		<?php echo $form->error($model,'duracion',array('class'=>'label label-danger')); ?>
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