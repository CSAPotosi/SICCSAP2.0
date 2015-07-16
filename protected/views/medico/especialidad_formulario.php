<input id="flag" type="hidden" value="1">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>($especialidad->isNewRecord ?'especialidad-form':'especialidad-form-upd'),
    'enableAjaxValidation'=>false,
)); ?>
    <?php echo CHtml::activeHiddenField($especialidad,'id_especialidad',array()); ?>
    <??>
<div class="form-group">
    <?php echo $form->labelEx($especialidad,'Especialidad'); ?>
    <?php echo $form->textField($especialidad,'nombre_especialidad',array('class'=>'form-control','placeholder'=>'Nombre de Especialidad')); ?>
    <?php echo $form->error($especialidad,'nombre_especialidad',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($especialidad,'Descripcion'); ?>
    <?php echo $form->textField($especialidad,'descripcion',array('class'=>'form-control','placeholder'=>'Descripcion de Especialidad')); ?>
    <?php echo $form->error($especialidad,'descripcion',array('class'=>'label label-danger')); ?>
</div>
<?php $this->endWidget(); ?>
</div>