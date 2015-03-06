

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
        <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

        <?php echo $form->errorSummary(array($servicio,$costoServicio),null,null,array('class'=>'alert alert-error')); ?>

        <div class="form-group">
            <?php echo $form->labelEx($servicio,'nombre_servicio',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($servicio,'nombre_servicio',array('class'=>'form-control','placeholder'=>'Escribe el nombre del servicio')); ?>
            </div>
            <?php echo $form->error($servicio,'nombre_servicio',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($servicio,'descripcion_servicio',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textArea($servicio,'descripcion_servicio',array('class'=>'form-control','placeholder'=>'Escribe una breve descripcion')); ?>
            </div>
            <?php echo $form->error($servicio,'descripcion_servicio',array('class'=>'label label-danger')); ?>
        </div>
        <?php echo $form->hiddenField($servicio,'id_categoria_serv'); ?>

        <div class="form-group">
            <?php echo $form->labelEx($costoServicio,'monto',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($costoServicio,'monto',array('class'=>'form-control','placeholder'=>'Escribe el costo del servicio')); ?>
            </div>
            <?php echo $form->error($costoServicio,'monto',array('class'=>'label label-danger')); ?>
        </div>

    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton($servicio->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>

            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->