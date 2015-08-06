<?php echo CHtml::beginForm(["consulta/createTratamientoAjax"],"post",["id"=>"form-tratamiento"]);?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Los datos marcados con <b>*</b> son obligatorios.
    </div>

    <?php echo CHtml::errorSummary(array_merge([$modelTratamiento],$listaReceta),'Para poder continuar debe corregir los siguientes problemas:',null,['class'=>'alert alert-danger']);?>

    <?php echo CHtml::activeHiddenField($modelTratamiento,'id_consulta');?>
    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelTratamiento,'instrucciones_trat');?>
        <?php echo CHtml::activeTextArea($modelTratamiento,'instrucciones_trat',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelTratamiento,'instrucciones_trat',['class'=>'label label-danger'])?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelTratamiento,'observaciones_trat');?>
        <?php echo CHtml::activeTextArea($modelTratamiento,'observaciones_trat',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelTratamiento,'observaciones_trat',['class'=>'label label-danger'])?>
    </div>

    <?php echo CHtml::label('RECETA',null);?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>MEDICAMENTO</th>
                <th>CANTIDAD</th>
                <th>DOSIS</th>
                <th>VIA</th>
                <th>PAUTA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $index=0; $modelReceta= new Receta();?>
            <?php foreach($listaReceta as $itemReceta):?>
                <tr>
                    <td><?php echo CHtml::activeHiddenField($itemReceta,"[$index]id_med",['class'=>'form-control']);?><?php echo CHtml::textField('labelMedicamento',($itemReceta->id_med!=null)?$itemReceta->medicamento->descripcion:'',['class'=>'form-control text-med']);  echo CHtml::error($itemReceta,"[$index]id_med",['class'=>'label label-danger']);?></td>
                    <td><?php echo CHtml::activeTextField($itemReceta,"[$index]cant_solicitada",['class'=>'form-control']); echo CHtml::error($itemReceta,"[$index]cant_solicitada",['class'=>'label label-danger']);?></td>
                    <td><?php echo CHtml::activeTextField($itemReceta,"[$index]cant_dosis",['class'=>'form-control']); echo CHtml::error($itemReceta,"[$index]cant_dosis",['class'=>'label label-danger']);?></td>
                    <td><?php echo CHtml::activeDropDownList($itemReceta,"[$index]via",$itemReceta->getOptionVia(),['class'=>'form-control']); echo CHtml::error($itemReceta,"[$index]via",['class'=>'label label-danger']);?></td>
                    <td><?php echo CHtml::activeTextField($itemReceta,"[$index]pauta",['class'=>'form-control']); echo CHtml::error($itemReceta,"[$index]pauta",['class'=>'label label-danger']);?></td>
                    <td><button type="button" class="btn btn-primary btn-remove-receta"><i class="fa fa-times"></i></button></td>
                </tr>
                <?php $index++;?>
            <?php endforeach;?>
            <tr>
                <td><?php echo CHtml::activeHiddenField($modelReceta,"[$index]id_med",['class'=>'form-control']);?><?php echo CHtml::textField('labelMedicamento',null,['class'=>'form-control text-med']); ?></td>
                <td><?php echo CHtml::activeTextField($modelReceta,"[$index]cant_solicitada",['class'=>'form-control']);?></td>
                <td><?php echo CHtml::activeTextField($modelReceta,"[$index]cant_dosis",['class'=>'form-control']);?></td>
                <td><?php echo CHtml::activeDropDownList($modelReceta,"[$index]via",$modelReceta->getOptionVia(),['class'=>'form-control']);?></td>
                <td><?php echo CHtml::activeTextField($modelReceta,"[$index]pauta",['class'=>'form-control']);?></td>
                <td><button type="button" class="btn btn-primary" data-index="<?php echo $index;?>" id="btn-save-receta"><i class="fa fa-save"></i></button></td>
            </tr>
        </tbody>
    </table>
<?php echo CHtml::endForm();?>
