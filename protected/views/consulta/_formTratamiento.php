<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?php echo CHtml::beginForm(["consulta/createTratamientoAjax"],"post",["id"=>"form-tratamiento"]);?>
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


                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>