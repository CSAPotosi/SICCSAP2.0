<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>($convenio_insti?'convenio-institucion-form':'convenio-institucion-form-update'),
        'enableAjaxValidation'=>false,
        'action'=>($convenio_insti->isNewRecord ? yii::app()->createUrl("ConvenioInstitucion/CrearConvenioInstitucion"):yii::app()->createUrl("/ConvenioInstitucion/ActualizarConvenioInstitucion",array('id'=>$convenio_insti->id_convenio))),
    )); ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($convenio_insti,'nombre_convenio'); ?>
            <?php echo $form->textField($convenio_insti,'nombre_convenio',array('class'=>'form-control','placeholder'=>'nombre_convenio')); ?>
            <?php echo $form->error($convenio_insti,'nombre_convenio',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($convenio_insti,'Institucion o Empresa'); ?>
            <?php echo $form->dropDownList($convenio_insti,'id_insti',$convenio_insti->GetInstitucion(),array('class'=>'form-control')); ?>
            <?php echo $form->error($convenio_insti,'id_insti',array('class'=>'label label-danger')); ?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo CHtml::Button($convenio_insti->isNewRecord ? 'Guardar' : 'Actualizar',array('class'=>'btn btn-primary','id'=>'btnConvenio_Insti')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>