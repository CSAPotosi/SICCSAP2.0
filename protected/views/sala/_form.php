<?php echo CHtml::beginForm(array('sala/createTipoSalaAjax'),'post',array('id'=>($modelServicio->isNewRecord)?'form-create-tipo_sala':'form-update-tipo_sala'));?>

    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Los campos con <span class="required">*</span> son obligatorios.
    </div>
    <?php echo CHtml::errorSummary(array($modelServicio,$modelTipoSala,$modelPrecio),null,null,array('class'=>'alert alert-danger')) ; ?>
    <?php
        if(!$modelServicio->isNewRecord)
            echo CHtml::activeHiddenField($modelServicio,'id_servicio');
    ?>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelServicio,'nombre_serv');?>
        <?php echo CHtml::activeTextField($modelServicio,'nombre_serv',array('class'=>'form-control','placeholder'=>'Escribe un nombre')); ?>
        <?php echo CHtml::error($modelServicio,'nombre_serv',array('class'=>'label label-danger'));?>
    </div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($modelTipoSala,'descripcion_tipo_sala'); ?>
		<?php echo CHtml::activeTextArea($modelTipoSala,'descripcion_tipo_sala',array('class'=>'form-control','placeholder'=>'Escribe una breve descripcion')); ?>
		<?php echo CHtml::error($modelTipoSala,'descripcion_tipo_sala',array('class'=>'label label-danger')); ?>
	</div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelPrecio,'monto');?>
        <div class="input-group">
            <span class="input-group-addon">
                <b>Bs.- </b>
            </span>
            <?php echo CHtml::activeTextField($modelPrecio,'monto',array('class'=>'form-control','placeholder'=>'0.00')); ?>
        </div>
        <?php echo CHtml::error($modelPrecio,'monto',array('class'=>'label label-danger'));?>
    </div>


<?php echo CHtml::endForm(); ?>