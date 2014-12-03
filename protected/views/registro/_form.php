<?php
/* @var $this RegistroController */
/* @var $model Registro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registro-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	        <center><b><p class="note">Los Campos con <span class="required">*</span> Son Obligatorios.</p></b></center>
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'codigo',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'codigo',array('class'=>'form-control','placeholder'=>'Inserte el codigo del empleado')); ?>
		</div>
		<?php echo $form->error($model,'codigo',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_hora_registro',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
            <?php
            $this->widget('ext.jui.EJuiDateTimePicker',
                array(
                    'model'     => $model,
                    'attribute' => 'fecha_hora_registro',
                    'language'=> 'es',//default Yii::app()->language
                    'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
                    'options'   => array(
                        'dateFormat' => 'dd.mm.yy',
                        'timeFormat' => 'hh:mm tt',// default
                    ),
                )
            );
            ?>
		</div>
		<?php echo $form->error($model,'fecha_hora_registro',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'observaciones',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'observaciones',array('class'=>'form-control','placeholder'=>'observaciones o comentarios del tickeo')); ?>
		</div>
		<?php echo $form->error($model,'observaciones',array('class'=>'label label-danger')); ?>
	</div>

</div>
	<div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
				<center><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?></center>
                
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->