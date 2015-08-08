<?php
$this->pageTitle='Actualizacion de rango';
?>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">EDICION DE RANGO PARA<b><?php echo $modelRango->parametro->nombre_par_lab;?></b></h3>
            </div>
            <div class="box-body">
                <?php echo CHtml::beginForm();?>
                <?php echo CHtml::activeHiddenField($modelRango,'id_par_lab');?>
                <div class="form-group">
                    <?php echo CHtml::activeLabelEx($modelRango,'valor_normal');?>
                    <?php echo CHtml::activeTextField($modelRango,'valor_normal',['class'=>'form-control']);?>
                    <?php echo CHtml::error($modelRango,'valor_normal',['class'=>'label label-danger']);?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::activeLabelEx($modelRango,'edad_minima');?>
                    <?php echo CHtml::activeTextField($modelRango,'edad_minima',['class'=>'form-control']);?>
                    <?php echo CHtml::error($modelRango,'edad_minima',['class'=>'label label-danger']);?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::activeLabelEx($modelRango,'edad_maxima');?>
                    <?php echo CHtml::activeTextField($modelRango,'edad_maxima',['class'=>'form-control']);?>
                    <?php echo CHtml::error($modelRango,'edad_maxima',['class'=>'label label-danger']);?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::activeLabelEx($modelRango,'sexo_rango');?><br/>
                    <?php echo CHtml::activeRadioButtonList($modelRango,'sexo_rango',RangosParametro::model()->getSexo()) ;?>
                    <?php echo CHtml::error($modelRango,'sexo_rango',['class'=>'label label-danger'])?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-primary']);?>
                </div>
                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>