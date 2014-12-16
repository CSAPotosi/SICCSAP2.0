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
		<div class="col-md-10">
			<?php echo $form->textField($model,'nombre_turno',array('class'=>'form-control','placeholder'=>'nombre_turno')); ?>
		</div>
		<?php echo $form->error($model,'nombre_turno',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tipo_turno',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-md-10">
			<?php echo $form->dropDownList($model,'tipo_turno',$model->getTipoTurno(),array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'tipo_turno',array('class'=>'label label-danger')); ?>
	</div>
    <?php  $value=($model->hora_entrada=="")?"":date("h:i A", strtotime($model->hora_entrada));   ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'hora_entrada',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-md-10">
            <?php echo $form->textField($model,'hora_entrada',array('value'=>$value,'class'=>'form-control','data-inputmask'=>'"mask":"99:99 aM"','placeholder'=>'hora','data-mask'=>'data-mask'));?>
		</div>
		<?php echo $form->error($model,'hora_entrada',array('class'=>'label label-danger')); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'inicio_entrada',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'inicio_entrada',array('class'=>'form-control','placeholder'=>'Inicio entrada')); ?>
        </div>
        <?php echo $form->error($model,'inicio_entrada',array('class'=>'label label-danger')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'fin_entrada',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'fin_entrada',array('class'=>'form-control','placeholder'=>'Fin entrada')); ?>
        </div>
        <?php echo $form->error($model,'fin_entrada',array('class'=>'label label-danger')); ?>
    </div>

    <?php  $value=($model->hora_salida=="")?"":date("h:i A", strtotime($model->hora_salida));   ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'hora_salida',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-md-10">
            <?php echo $form->textField($model,'hora_salida',array('value'=>$value,'class'=>'form-control','data-inputmask'=>'"mask":"99:99 aM"','placeholder'=>'hora','data-mask'=>'data-mask'));?>
		</div>
		<?php echo $form->error($model,'hora_salida',array('class'=>'label label-danger')); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'inicio_salida',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'inicio_salida',array('class'=>'form-control','placeholder'=>'Inicio salida')); ?>
        </div>
        <?php echo $form->error($model,'inicio_salida',array('class'=>'label label-danger')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'fin_salida',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'fin_salida',array('class'=>'form-control','placeholder'=>'Fin salida')); ?>
        </div>
        <?php echo $form->error($model,'fin_salida',array('class'=>'label label-danger')); ?>
    </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tolerancia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-md-10">
			<?php echo $form->textField($model,'tolerancia',array('class'=>'form-control','placeholder'=>'tolerancia')); ?>
		</div>
		<?php echo $form->error($model,'tolerancia',array('class'=>'label label-danger')); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'dias',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'dias',array('value'=>'1111100','class'=>'form-control','data-inputmask'=>'"mask":"9999999"','placeholder'=>'Dias','data-mask'=>'data-mask')); ?>
        </div>
        <?php echo $form->error($model,'dias',array('class'=>'label label-danger')); ?>
    </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_horario',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-md-10">
			<?php echo $form->textField($model,'id_horario',array('class'=>'form-control','placeholder'=>'id_horario','disabled'=>'true')); ?>
		</div>
		<?php echo $form->error($model,'id_horario',array('class'=>'label label-danger')); ?>
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