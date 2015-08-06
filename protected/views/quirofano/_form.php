<?php echo CHtml::beginForm();?>
<div class="box-body">
    <div class="form-group">
        <?php echo CHtml::activeLabelEx($model,'nombre_q');?>
        <?php echo CHtml::activeTextField($model,'nombre_q',['class'=>'form-control']);?>
        <?php echo CHtml::error($model,'nombre_q',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($model,'descripcion');?>
        <?php echo CHtml::activeTextArea($model,'descripcion',['class'=>'form-control']);?>
        <?php echo CHtml::error($model,'descripcion',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($model,'costo');?>
        <div class="input-group">
            <?php echo CHtml::activeTextField($model,'costo',['class'=>'form-control']);?>
            <span class="input-group-addon">
                <b>Bs.- </b>
            </span>
        </div>
        <?php echo CHtml::error($model,'costo',['class'=>'label label-danger']);?>
    </div>
</div>
<div class="box-footer">
    <div class="form-group">
        <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-primary')); ?>
    </div>
</div>
<?php echo CHtml::endForm();?>
