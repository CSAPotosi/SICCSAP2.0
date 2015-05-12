<input id="flag" type="hidden" value="1">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="contenedorformcatlab" id="contenedorformcatlab">
                    <?php $form=$this->beginWidget('CActiveForm',array('id'=>'form-cat-lab-item','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'form-horizontal'),)); ?>
                        <div class="box-body">
                            <?php echo CHtml::errorSummary($servicio,null,null,array('class'=>'alert alert-error')); ?>
                            <input id="cat_lab_item_campo" type="hidden" value="" name="ExamenLaboratorio[id_cat_lab]" id="ExamenLaboratorio_id_cat_lab">
                            <div class="form-group">
                                <?php echo CHtml::activelabelEx($servicio,'Codigo de Servicio'); ?>
                                <?php echo CHtml::activetextField($servicio,'codigo_serv',array('class'=>'form-control','placeholder'=>'Codigo Servicio')); ?>
                                <?php echo CHtml::error($servicio,'codigo_serv',array('class'=>'label label-danger')); ?>
                            </div>
                            <div class="form-group">
                                    <?php echo CHtml::activelabelEx($servicio,'Nombre del Servicio'); ?>
                                    <?php echo CHtml::activetextField($servicio,'nombre_serv',array('class'=>'form-control','placeholder'=>'Nombre Servicio')); ?>
                                    <?php echo CHtml::error($servicio,'nombre_serv',array('class'=>'label label-danger')); ?>
                            </div>
                            <div class="form-group">
                                    <?php echo CHtml::activelabelEx($servicio,'Unidad del servicio'); ?>
                                    <?php echo CHtml::activetextField($servicio,'unidad_serv',array('class'=>'form-control','placeholder'=>'Unidad de Servicios')); ?>
                                    <?php echo CHtml::error($servicio,'unidad_serv',array('class'=>'label label-danger')); ?>
                            </div>
                            <div class="form-group">
                                    <?php echo CHtml::activelabelEx($servicio,'Institucion o Clinica'); ?>
                                    <?php echo CHtml::activedropDownList($servicio,'id_insti',$servicio->GetInstitucion(),array('class'=>'form-control','prompt'=>'seleccione')); ?>
                                    <?php echo CHtml::error($servicio,'id_insti',array('class'=>'label label-danger')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::activelabelEx($precio,'Monto'); ?>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <b>Bs.- </b>
                                    </span>
                                    <?php echo CHtml::activetextField($precio,'monto',array('class'=>'form-control','placeholder'=>'0.00')); ?>
                                    <?php echo CHtml::error($precio,'monto',array('class'=>'label label-danger')); ?>
                                </div>
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>

                </div>
            </div>
        </div>
    </div>
</div>