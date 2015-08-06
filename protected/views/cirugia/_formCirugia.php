<?php echo CHtml::beginForm(($modelCirugia->isNewRecord)?['cirugia/programarCirugiaAjax']:['cirugia/updateCirugia','id_c'=>$modelCirugia->id_c],'post',['id'=>'form-programacion']);?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Los campos con <span class="required">*</span> son obligatorios.
    </div>
    <?php echo CHtml::errorSummary(array($modelParticipe,$modelCirugia),'Corriga los siguientes problemas para continuar:',null,array('class'=>'alert alert-danger')) ; ?>

    <div class="form-group">
        <?php echo CHtml::label('MEDICO RESPONSABLE *',null);?>
        <div class="input-group">
            <?php echo CHtml::textField('nombre_medico',($modelParticipe->id_per!=null)?$modelParticipe->persona->nombreCompleto:'',['class'=>'form-control','disabled'=>'disabled']);?>
            <span class="input-group-btn">
                <button type="button" class="btn btn-primary" data-target="#modalBuscaPersona" data-toggle="modal"><i class="fa fa-search"></i></button>
            </span>
        </div>
        <?php if(!$modelCirugia->isNewRecord) echo CHtml::activeHiddenField($modelCirugia,'id_c')?>
        <?php echo CHtml::activeHiddenField($modelCirugia,'id_historial')?>
        <?php echo CHtml::activeHiddenField($modelParticipe,'id_per');?>
        <?php echo CHtml::activeHiddenField($modelParticipe,'es_responsable',['value'=>true]);?>
        <?php echo CHtml::error($modelParticipe,'id_per',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelParticipe,'rol_cirugia');?>
        <?php echo CHtml::activeTextField($modelParticipe,'rol_cirugia',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelParticipe,'rol_cirugia',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelCirugia,'fecha_hora_prog');?>
        <?php echo CHtml::activeTextField($modelCirugia,'fecha_hora_prog',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelCirugia,'fecha_hora_prog',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelCirugia,'duracion_aprox');?>
        <?php echo CHtml::activeTextField($modelCirugia,'duracion_aprox',['class'=>'form-control']);?>
        <?php echo CHtml::error($modelCirugia,'duracion_aprox',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::activeLabelEx($modelCirugia,'id_q');?>
        <?php echo CHtml::activeDropDownList($modelCirugia,'id_q',CHtml::listData(Quirofano::model()->findAll("estado_q=true"),'id_q','nombre_q'),['class'=>'form-control']);?>
        <?php echo CHtml::error($modelCirugia,'id_q',['class'=>'label label-danger']);?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton('GUARDAR',['class'=>'btn btn-primary']);?>
        <button type="reset" class="btn btn-success">LIMPIAR</button>
    </div>
<?php echo CHtml::endForm();?>