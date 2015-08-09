<input id="flag" type="hidden" value="1">
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>($cargo->isNewRecord?'cargo-form':'cargo-form-update'),
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">
        <?php echo $form->errorSummary($cargo,null,null,array('class'=>'alert alert-error')); ?>
        <div class="form-group">
            <?php echo $form->labelEx($cargo,'nombre_cargo'); ?>
            <?php echo $form->textField($cargo,'nombre_cargo',array('class'=>'form-control','placeholder'=>'nombre_cargo')); ?>
            <?php echo $form->error($cargo,'nombre_cargo',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($cargo,'descripcion_cargo'); ?>
            <?php echo $form->textField($cargo,'descripcion_cargo',array('class'=>'form-control','placeholder'=>'descripcion_cargo')); ?>
            <?php echo $form->error($cargo,'descripcion_cargo',array('class'=>'label label-danger')); ?>
        </div>
        <input type="hidden" value="" id="cargounidad" name="Cargo[id_unidad]">
    </div>
     <?php if(!$cargo->isNewRecord){?>
         <input type="hidden" name="Cargo[id_unidad]" value="<?php echo $cargo->id_unidad?>">
         <input type="hidden" name="Cargo[id_cargo]" value="<?php echo $cargo->id_cargo?>">
    <?php }?>
    <?php $this->endWidget(); ?>
</div><!-- form -->