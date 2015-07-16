<?php
/* @var $this AgendaController */
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
	<?php echo $form->errorSummary($cita,null,null,array('class'=>'alert alert-error')); ?>
	<div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($cita,'fecha'); ?>
                <?php echo $form->dateField($cita,'fecha',array('class'=>'form-control','placeholder'=>'fecha')); ?>
                <?php echo $form->error($cita,'fecha',array('class'=>'label label-danger')); ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->labelEx($cita,'hora_cita'); ?>
                <?php echo $form->timeField($cita,'hora_cita',array('class'=>'form-control','placeholder'=>'hora_cita')); ?>
                <?php echo $form->error($cita,'hora_cita',array('class'=>'label label-danger')); ?>
            </div>
        </div>
	</div>
    <div class="form-group">
        <?php echo $form->labelEx($cita,'Atencion Medica'); ?>
        <?php echo $form->textField($cita,'medico_consulta_servicio',array('class'=>'form-control','placeholder'=>'Atencion Medica')); ?>
        <?php echo $form->error($cita,'medico_consulta_servicio',array('class'=>'label label-danger')); ?>
    </div>
	<div class="form-group">
		<?php echo $form->labelEx($cita,'Paciente'); ?>
		<?php echo $form->textField($cita,'id_paciente',array('class'=>'form-control','placeholder'=>'Nombre Paciente')); ?>
		<?php echo $form->error($cita,'id_paciente',array('class'=>'label label-danger')); ?>
	</div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($cita,'Estado'); ?>
                <?php echo $form->textField($cita,'estado_cita',array('class'=>'form-control','placeholder'=>'estado_cita')); ?>
                <?php echo $form->error($cita,'estado_cita',array('class'=>'label label-danger')); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->