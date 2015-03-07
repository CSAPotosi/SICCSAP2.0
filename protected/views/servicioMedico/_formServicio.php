<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'servicio-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>
    <div class="box-body">
        <p class="callout callout-info">Los campos con <span class="required">*</span> son obligatorios.</p>

        <?php echo $form->errorSummary(array($servicio,$costoServicio),null,null,array('class'=>'alert alert-danger')); ?>

        <div class="form-group">
            <?php echo $form->labelEx($servicio,'nombre_servicio'); ?>
            <?php echo $form->textField($servicio,'nombre_servicio',array('class'=>'form-control','placeholder'=>'Escribe el nombre del servicio')); ?>
            <?php echo $form->error($servicio,'nombre_servicio',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($servicio,'descripcion_servicio'); ?>
            <?php echo $form->textArea($servicio,'descripcion_servicio',array('class'=>'form-control','placeholder'=>'Escribe una breve descripcion')); ?>
            <?php echo $form->error($servicio,'descripcion_servicio',array('class'=>'label label-danger')); ?>
        </div>
        <?php echo $form->hiddenField($servicio,'id_categoria_serv'); ?>

        <div class="form-group">
            <?php echo $form->labelEx($costoServicio,'monto'); ?>
            <div class="input-group">
                <span class="input-group-addon"><b>Bs.-</b></span>
                <?php echo $form->textField($costoServicio,'monto',array('class'=>'form-control','placeholder'=>'0.00')); ?>
            </div>
            <?php echo $form->error($costoServicio,'monto',array('class'=>'label label-danger')); ?>
        </div>

    </div>
    <div class="box-footer">
        <div class="form-group">
                <?php echo CHtml::submitButton($servicio->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->