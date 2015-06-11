<?php
    $this->pageTitle='Creacion de rango';
?>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">NUEVO RANGO PARA <b><?php echo $modelParametro->nombre_par_lab;?></b></h3>
            </div>
            <div class="box-body">
                <?php echo CHtml::beginForm();?>
                    <?php echo CHtml::activeHiddenField($modelRango,'id_par_lab',['value'=>$modelParametro->id_par_lab]);?>
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelRango,'valor_min');?>
                        <?php echo CHtml::activeTextField($modelRango,'valor_min',['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelRango,'valor_min',['class'=>'label label-danger']);?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($modelRango,'valor_max');?>
                        <?php echo CHtml::activeTextField($modelRango,'valor_max',['class'=>'form-control']);?>
                        <?php echo CHtml::error($modelRango,'valor_max',['class'=>'label label-danger']);?>
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