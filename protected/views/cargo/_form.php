<?php
/* @var $this CargoController */
/* @var $model Cargo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cargo-form',
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
		<?php echo $form->labelEx($model,'nombre_cargo',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nombre_cargo',array('class'=>'form-control','placeholder'=>'nombre_cargo')); ?>
		</div>
		<?php echo $form->error($model,'nombre_cargo',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion_cargo',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'descripcion_cargo',array('class'=>'form-control','placeholder'=>'descripcion_cargo')); ?>
		</div>
		<?php echo $form->error($model,'descripcion_cargo',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_unidad',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
            <?php echo $form->dropDownList($model,'id_unidad', $model->getUnidades(),array('class'=>'form-control',)); ?>
		</div>
		<?php echo $form->error($model,'id_unidad',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'estado',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
            <?php echo $form->dropDownList($model,'estado', array("ACTIVO","INACTIVO"),array('class'=>'form-control',)); ?>
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