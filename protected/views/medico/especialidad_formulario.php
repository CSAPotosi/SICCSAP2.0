<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'especialidad-form',
    'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->labelEx($especialidad,'Especialidad'); ?>
<?php echo $form->textField($especialidad,'nombre_especialidad',array('class'=>'form-control','placeholder'=>'Nombre de Especialidad')); ?>
<?php echo $form->error($especialidad,'nombre_especialidad',array('class'=>'label label-danger')); ?>
<?php echo $form->labelEx($especialidad,'Descripcion'); ?>
<?php echo $form->textField($especialidad,'descripcion',array('class'=>'form-control','placeholder'=>'Descripcion de Especialidad')); ?>
<?php echo $form->error($especialidad,'descripcion',array('class'=>'label label-danger')); ?>
<?php $this->endWidget(); ?>
</div>