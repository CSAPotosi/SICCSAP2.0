<?php
/* @var $this ServicioController */
/* @var $model Servicio */
/* @var $form CActiveForm */
?>
<div class="col-md-6">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servicio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>
	<div class="form-group">
        <?php echo $form->textField($model,'codigo_serv',array('class'=>'form-control','placeholder'=>'Codigo de Servicio')); ?>
		<?php echo $form->error($model,'codigo_serv',array('class'=>'label label-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Nombre del Servicio'); ?>
        <?php echo $form->textField($model,'nombre_serv',array('class'=>'form-control','placeholder'=>'Nombre Servicio')); ?>
		<?php echo $form->error($model,'nombre_serv',array('class'=>'label label-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Unidad del servicio'); ?>
        <?php echo $form->textField($model,'unidad_serv',array('class'=>'form-control','placeholder'=>'Unidad de Servicios')); ?>
		<?php echo $form->error($model,'unidad_serv',array('class'=>'label label-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Institucion o Clinica'); ?>
		<?php echo $form->dropDownList($model,'id_insti',$model->GetInstitucion(),array('class'=>'form-control','prompt'=>'seleccione')); ?>
		<?php echo $form->error($model,'id_insti',array('class'=>'label label-danger')); ?>
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
</div>
