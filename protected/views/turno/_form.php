<?php
/* @var $this TurnoController */
/* @var $model Turno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turno-form',
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
		<?php echo $form->labelEx($model,'nombre_turno',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nombre_turno',array('class'=>'form-control','placeholder'=>'nombre_turno')); ?>
		</div>
		<?php echo $form->error($model,'nombre_turno',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tipo_turno',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'tipo_turno',array('class'=>'form-control','placeholder'=>'tipo_turno')); ?>
		</div>
		<?php echo $form->error($model,'tipo_turno',array('class'=>'label label-danger')); ?>
	</div>
    <?php  $value=($model->hora_ingreso=="")?"":date("h:i A", strtotime($model->hora_ingreso));   ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'hora_ingreso',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
            <input type="text"  value="<?php echo $value; ?>" name="Turno[hora_ingreso]" id="Turno_hora_ingreso" class="form-control" data-inputmask='"mask": "99:99 aM"' placeholder="hora" data-mask/>
		</div>
		<?php echo $form->error($model,'hora_ingreso',array('class'=>'label label-danger')); ?>
	</div>

    <?php  $value=($model->hora_salida=="")?"":date("h:i A", strtotime($model->hora_salida));   ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'hora_salida',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
            <input type="text"  value="<?php echo $value; ?>" name="Turno[hora_salida]" id="Turno_hora_salida" class="form-control" data-inputmask='"mask": "99:99 aM"' placeholder="hora" data-mask/>
		</div>
		<?php echo $form->error($model,'hora_salida',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tolerancia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'tolerancia',array('class'=>'form-control','placeholder'=>'tolerancia')); ?>
		</div>
		<?php echo $form->error($model,'tolerancia',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_horario',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'id_horario',array('class'=>'form-control','placeholder'=>'id_horario','disabled'=>'true')); ?>
		</div>
		<?php echo $form->error($model,'id_horario',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'estado',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'estado',array('class'=>'form-control','placeholder'=>'estado','disabled='=>'true')); ?>
		</div>
		<?php echo $form->error($model,'estado',array('class'=>'label label-danger')); ?>
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