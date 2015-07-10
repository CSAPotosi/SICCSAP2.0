<?php
    $this->pageTitle='Examen';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$resultado->historial))?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-solid box-primary">
            <div class="box-body">
                    <?php echo CHtml::errorSummary(array_merge($listaParametros,[$resultado]));?>
                    <?php echo CHtml::beginForm('','post',['class'=>'form-horizontal']);?>
                    <?php echo CHtml::activeHiddenField($resultado,"id_historial");?>
                    <?php foreach($listaParametros as $i=>$itemPar):?>
                        <div class="form-group">
                            <?php echo CHtml::label($itemPar->parametro->nombre_par_lab,'qwe',['class'=>'col-sm-3 control-label'])?>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <?php echo CHtml::activeTextField($itemPar,"[$i]valor_resultado",['class'=>'form-control']);?>
                                    <?php echo CHtml::activeHiddenField($itemPar,"[$i]id_parametro");?>
                                    <div class="input-group-addon">
                                        <?php echo $itemPar->parametro->unidad_par_lab;?>
                                    </div>
                                </div>
                                <?php echo CHtml::error($itemPar,"[$i]valor_resultado",['class'=>'label label-danger']);?>
                            </div>
                            <div class="col-sm-3">
                                <a href="#" ><i class="fa fa-info-circle text-red"></i></a>
                            </div>
                        </div>
                    <?php endforeach;?>
                    <div class="form-group">
                        <?php echo CHtml::activeLabel($resultado,'diagnostico',['class'=>'col-sm-3 control-label']);?>
                        <div class="col-sm-6">
                            <?php echo CHtml::activeTextArea($resultado,'diagnostico',['class'=>'form-control']);?>
                            <?php echo CHtml::error($resultado,'diagnostico',['class'=>'label label-danger']);?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activeLabel($resultado,'observaciones',['class'=>'col-sm-3 control-label']);?>
                        <div class="col-sm-6">
                            <?php echo CHtml::activeTextArea($resultado,'observaciones',['class'=>'form-control']);?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-primary'])?>
                        </div>
                    </div>
                    <?php CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>
