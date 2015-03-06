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
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model,$modelCosto),null,null,array('class'=>'alert alert-error')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre_tipo_sala',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nombre_tipo_sala',array('class'=>'form-control','placeholder'=>'Escribe el nombre del tipo de sala')); ?>
		</div>
		<?php echo $form->error($model,'nombre_tipo_sala',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion_tipo_sala',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textArea($model,'descripcion_tipo_sala',array('class'=>'form-control','placeholder'=>'Escribe una breve descripcion')); ?>
		</div>
		<?php echo $form->error($model,'descripcion_tipo_sala',array('class'=>'label label-danger')); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($modelCosto,'monto',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($modelCosto,'monto',array('class'=>'form-control','placeholder'=>'Escribe el costo que tendra este tipo de sala')); ?>
        </div>
        <?php echo $form->error($modelCosto,'monto',array('class'=>'label label-danger')); ?>
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