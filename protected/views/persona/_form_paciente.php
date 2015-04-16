<?php
/* @var $this HistorialPacienteController */
/* @var $paciente HistorialPaciente */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'historial-paciente-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($paciente,null,null,array('class'=>'alert alert-error')); ?>


        <div class="form-group">
            <?php echo $form->labelEx($paciente,'ocupacion_paciente',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($paciente,'ocupacion_paciente',array('class'=>'form-control','placeholder'=>'ocupacion_paciente')); ?>
            </div>
            <?php echo $form->error($paciente,'ocupacion_paciente',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($paciente,'grupo_sanguineo_paciente',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($paciente,'grupo_sanguineo_paciente',array('class'=>'form-control','placeholder'=>'grupo_sanguineo_paciente')); ?>
            </div>
            <?php echo $form->error($paciente,'grupo_sanguineo_paciente',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($paciente,'estado_paciente',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($paciente,'estado_paciente',array('class'=>'form-control','placeholder'=>'tipo_paciente')); ?>
            </div>
            <?php echo $form->error($paciente,'estado_paciente',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-warning">Registar Contacto</button>
                    </div>
                    <?php echo $form->textField($paciente,'id_contacto_paciente',array('class'=>'form-control','placeholder'=>'Nombre del contacto','disabled'=>'disabled')); ?>
                    <?php echo $form->error($paciente,'id_contacto_paciente',array('class'=>'label label-danger')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton($paciente->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->