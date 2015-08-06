<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
    'Auth Items'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List AuthItem', 'url'=>array('index')),
    array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<h1>Asignar Rol</h1>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'auth-assignment-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'parent'); ?>
        <?php echo $form->dropDownList($model,'parent',$this->getRoles()); ?>
        <?php echo $form->error($model,'parent'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'child'); ?>
        <?php echo $form->dropDownList($model,'child',$this->getRoles()); ?>
        <?php echo $form->error($model,'child'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>