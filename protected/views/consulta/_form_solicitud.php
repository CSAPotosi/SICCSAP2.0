
<div class="form" >
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'solicitud-servicios-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">
        <input type="hidden" name="SolicitudServicios[id_historial]" value="<?php echo $historial;?>">
        <?php echo CHtml::activeHiddenField($solicitud,'estado',array('class'=>'form-control','value'=>'solicitud','id'=>'estadosolicitud')); ?>
        <?php echo CHtml::activeHiddenField($solicitud,'descuento',array('class'=>'form-control','value'=>'0','id'=>'descuentototal')); ?>
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-4 col-xs-8">
                    <?php echo CHtml::activelabelEx($solicitud,'total'); ?>
                    <div class="input-group">
                        <?php echo CHtml::activeTextField($solicitud,'total',array('class'=>'form-control','id'=>'total','disabled'=>'disabled'))?>
                        <span class="input-group-addon">Bs.</span>
                    </div>
                </div>
                <div class="col-md-6 col-xs-8">
                    <?php echo CHtml::activeLabelEx($solicitud,'Observaciones')?>
                    <?php echo CHtml::activeTextArea($solicitud,'observaciones',array('class'=>'form-control'))?>
                </div>
                <div class="col-md-2 col-xs-4">
                    <br>
                    <button type="button" class="btn btn-primary btn-lg"  id="btnsolicitud" disabled>Registrar solicitud de Servicio</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>