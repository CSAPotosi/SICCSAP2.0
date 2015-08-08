<?php
    $this->pageTitle='Nuevo parametro de laboratorio';
?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary box-solid">
            <div class="box-body">
                <?php echo CHtml::beginForm((!$modelParametro->isNewRecord)?['updateParametro','id_par'=>$modelParametro->id_par_lab]:null,'post');?>
                    <?php echo CHtml::activeHiddenField($modelParametro,'id_par_lab');?>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelParametro,'nombre_par_lab');?>
                        <?php echo CHtml::activeTextField($modelParametro,'nombre_par_lab',['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelParametro,'nombre_par_lab',['class'=>'label label-danger']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelParametro,'unidad_par_lab');?>
                        <?php echo CHtml::activeTextField($modelParametro,'unidad_par_lab',['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelParametro,'unidad_par_lab',['class'=>'label label-danger']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-primary'])?>
                    </div>
                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>