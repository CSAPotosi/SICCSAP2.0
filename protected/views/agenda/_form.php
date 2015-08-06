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
    <div class="callout callout-success">
        <h4>Paciente</h4>
        <p><?php echo $persona->nombreCompleto?></p>
    </div>
	<div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" value="<?php echo $persona->id?>" name="Persona[id]">
                <input type="hidden" value="<?php echo $persona->nombreCompleto?>" id="nombreCompleto">
                <?php echo $form->labelEx($cita,'fecha'); ?>
                <?php echo $form->dateField($cita,'fecha',array('class'=>'form-control','placeholder'=>'fecha','id'=>'date')); ?>
                <?php echo $form->error($cita,'fecha',array('class'=>'label label-danger')); ?>
            </div>
            <div class="col-md-6">

                <?php echo $form->labelEx($cita,'hora_cita'); ?>
                <?php echo $form->timeField($cita,'hora_cita',array('class'=>'form-control')); ?>
                <?php echo $form->error($cita,'hora_cita',array('class'=>'label label-danger')); ?>
            </div>
        </div>
	</div>
    <div class="form-group">
        <?php echo $form->labelEx($cita,'Atencion Medica'); ?>
        <?php echo $form->hiddenField($cita,'medico_consulta_servicio',array('class'=>'form-control','id'=>'codigoatencion' )); ?>
        <input type="text" id="agendamedica" class="form-control" placeholder="Elija la atencion medica en la tabla de abajo" disabled>
        <?php echo $form->error($cita,'medico_consulta_servicio',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($cita,'Estado Cita'); ?>
                <?php echo $form->dropDownList($cita,'estado_cita',array('0'=>'reservado','1'=>'confirmado'),array('class'=>'form-control')); ?>
                <?php echo $form->error($cita,'estado_cita',array('class'=>'label label-danger')); ?>
            </div>
            <div class="col-md-6">
                <br>
                <input type="button" value="Guardar Cita" class="btn btn-primary" target="_blank" id="btnformcita">
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->