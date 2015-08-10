<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Reporte de Seguros de Paciente y Servicios Conveniados
            </div>
            <div class="box-body">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'form-reporte-convenio',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array('class'=>'form-horizontal'),
                    'action'=>yii::app()->createUrl("/reportes/ReporteConveniosCompleto")
                )); ?>
               <div class="row">
                   <div class="col-md-6">
                       <?php $listarConvenios=ConvenioInstitucion::model()->findAll();?>
                       <label>Convenios Intitucionales</label>
                       <?php echo CHtml::dropDownList('Convenioseguros',null,CHtml::listData($listarConvenios,'id_convenio','nombre_convenio'),array('class'=>'form-control'))?>
                   </div>
                   <div class="col-md-6">
                       <label>Contenido del Reporte</label><br>
                       Reporte de Convenios con Pacientes Asegurados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="checkbox" class="ckeck1" name="convenio" value="convenio"><br><br>
                       Reporte de Convenios con Servicios Conveniados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="checkbox" class="ckeck2" name="servicios" value="servicios">
                   </div>
               </div>
                <?php $this->endWidget(); ?>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="button" value="Generar Reporte" class="btn btn-primary" id="btnreporteseguro" target="_blank">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('form_emergencia','
$(function(){
    $("input[type=\'checkbox\'],input[type=\'checkbox\']").iCheck({
    checkboxClass:"icheckbox_flat-blue",
    radioClass:"iradio_flat-blue"
    });
});
$("#btnreporteseguro").on("click",function(){
    $("#form-reporte-convenio").submit();
})
',CClientScript::POS_END);
?>