<?php
    $sexo=[0=>'AMBOS SEXOS',1=>'VARONES',2=>'MUJERES'];
?>

<?php echo CHtml::beginForm(['laboratorio/createExamenLaboratorio','id_det'=>$modelResultado->id_detalle_servicio],"post");?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Los datos marcados con <b>*</b> son obligatorios.
    </div>

    <?php echo CHtml::errorSummary(array_merge([$modelResultado],$listaParRes),'Para poder continuar debe corregir los siguientes problemas:',null,['class'=>'alert alert-danger']);?>

    <?php $index=0;
    foreach($listaParRes as $itemP):?>
        <div class="row">
            <div class="col-md-4" style="text-align: right">
                <?php echo CHtml::label($itemP->parametro->nombre_par_lab." *:",null);?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group">
                        <?php echo CHtml::activeHiddenField($itemP,"[$index]id_parametro",['class'=>'form-control']);?>
                        <?php echo CHtml::activeTextField($itemP,"[$index]valor_resultado",['class'=>'form-control']);?>
                        <span class="input-group-addon">
                            <?php echo $itemP->parametro->unidad_par_lab; ?>
                        </span>
                    </div>
                    <?php echo CHtml::error($itemP,"[$index]valor_resultado",['class'=>'label label-danger']);?>
                </div>
            </div>
            <div class="col-md-4">
                <?php foreach($itemP->parametro->rangosParametros as $itemPar):?>
                    <?php echo $itemPar->valor_normal." (de {$itemPar->edad_minima} a {$itemPar->edad_maxima} años, {$sexo[$itemPar->sexo_rango]} )<br/>";?>
                <?php endforeach;?>
            </div>
        </div>

    <?php $index++; endforeach;?>
    <?php echo CHtml::activeHiddenField($modelResultado,"id_detalle_servicio");?>
    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelResultado,"diagnostico");?>
        <?php echo CHtml::activeTextArea($modelResultado,"diagnostico",['class'=>'form-control']);?>
        <?php echo CHtml::error($modelResultado,"diagnostico",['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelResultado,"observaciones");?>
        <?php echo CHtml::activeTextArea($modelResultado,"observaciones",['class'=>'form-control']);?>
        <?php echo CHtml::error($modelResultado,"observaciones",['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
<?php echo CHtml::endForm();?>