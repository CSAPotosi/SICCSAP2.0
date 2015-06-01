<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'empleado-form','action'=>($empleado->isNewRecord ? yii::app()->createUrl("persona/Updateempleado"):yii::app()->createUrl("persona/Updempleadoper&id=".$empleado->id)),
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">
        <?php echo $form->errorSummary($empleado,null,null,array('class'=>'alert alert-error')); ?>
        <input type="hidden" value="<?php echo $lastid;?>" name="Empleado[id]">
        <div class="form-group">
            <?php echo $form->labelEx($empleado,'fecha de Contratacion'); ?>
            <?php echo $form->datefield($empleado,'fecha_contratacion',array('class'=>'form-control')); ?>
            <?php echo $form->error($empleado,'fecha_contratacion',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($empleado,'profesion'); ?>
            <?php echo $form->textField($empleado,'profesion',array('class'=>'form-control','placeholder'=>'Profesion del empleado')); ?>
            <?php echo $form->error($empleado,'profesion',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($empleado,'estado'); ?>
                <?php echo $form->dropDownList($empleado,'estado',array('Activo'=>'activo','inactivo'=>'Inactivo'),array('class'=>'form-control')); ?>
            <?php echo $form->error($empleado,'estado',array('class'=>'label label-danger')); ?>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-0 col-sm-10">
                <?php echo CHtml::submitButton($empleado->isNewRecord ? 'Guardar Datos de Empelado' : 'Actualizar Datos de empleado',array('class'=>'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->