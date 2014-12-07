<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persona-form',
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
		<?php echo $form->labelEx($model,'dni',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'dni',array('class'=>'form-control','placeholder'=>'dni')); ?>
		</div>
		<?php echo $form->error($model,'dni',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nit',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nit',array('class'=>'form-control','placeholder'=>'nit')); ?>
		</div>
		<?php echo $form->error($model,'nit',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombres',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nombres',array('class'=>'form-control','placeholder'=>'nombres')); ?>
		</div>
		<?php echo $form->error($model,'nombres',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'primer_apellido',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'primer_apellido',array('class'=>'form-control','placeholder'=>'primer_apellido')); ?>
		</div>
		<?php echo $form->error($model,'primer_apellido',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'segundo_apellido',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'segundo_apellido',array('class'=>'form-control','placeholder'=>'segundo_apellido')); ?>
		</div>
		<?php echo $form->error($model,'segundo_apellido',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sexo',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'sexo',array('class'=>'form-control','placeholder'=>'sexo')); ?>
		</div>
		<?php echo $form->error($model,'sexo',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_nacimiento',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'fecha_nacimiento',array('class'=>'form-control','placeholder'=>'fecha_nacimiento')); ?>
		</div>
		<?php echo $form->error($model,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'estado_civil',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'estado_civil',array('class'=>'form-control','placeholder'=>'estado_civil')); ?>
		</div>
		<?php echo $form->error($model,'estado_civil',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pais',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'pais',array('class'=>'form-control','placeholder'=>'pais')); ?>
		</div>
		<?php echo $form->error($model,'pais',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'provincia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'provincia',array('class'=>'form-control','placeholder'=>'provincia')); ?>
		</div>
		<?php echo $form->error($model,'provincia',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'localidad',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'localidad',array('class'=>'form-control','placeholder'=>'localidad')); ?>
		</div>
		<?php echo $form->error($model,'localidad',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'telefono',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'telefono',array('class'=>'form-control','placeholder'=>'telefono')); ?>
		</div>
		<?php echo $form->error($model,'telefono',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'celular',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'celular',array('class'=>'form-control','placeholder'=>'celular')); ?>
		</div>
		<?php echo $form->error($model,'celular',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'email')); ?>
		</div>
		<?php echo $form->error($model,'email',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fotografia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'fotografia',array('class'=>'form-control','placeholder'=>'fotografia')); ?>
		</div>
		<?php echo $form->error($model,'fotografia',array('class'=>'label label-danger')); ?>
	</div>

</div>


<?php $this->endWidget(); ?>

</div><!-- form -->