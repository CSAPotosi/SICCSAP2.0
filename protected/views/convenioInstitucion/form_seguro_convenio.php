
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'convenio-seguro-form',
    'enableAjaxValidation'=>false,
    'action'=>yii::app()->createUrl("ConvenioInstitucion/CrearSeguroPaciente"),
)); ?>
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Tipo de Paciente</label>
                        <?php echo $form->dropDownList($seguro,'tipo_asegurado',array(''=>'seleccione','titular'=>'titular','beneficiario'=>'beneficiario'),array('class'=>'form-control','id'=>'listatipopaciente')); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($seguro,'Paciente'); ?>
                        <input type="hidden" value="<?php echo $paciente->id_paciente?>" name="SeguroConvenio[id_paciente]" id="idpacienteasegurado">
                        <input type="text" value="<?php echo $paciente->personapa->nombreCompleto?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <label>Fecha Inicio de Seguro</label>
                        <div class="input-group date" id="datetimepicker1">
                            <input class="form-control" type="text" name="SeguroConvenio[fecha_inicio]"/>
                                   <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar">
                                       </span>
                                   </span>
                        </div>
                        <?php echo $form->error($seguro,'fecha_inicio',array('class'=>'label label-danger')); ?>
                </div>
            </div>
            <div class="row">
                <br>
                <div id="contenedortipopaciente">

                </div>
            </div>
            <div class="row">
                <br>
                <div class="col-md-6">
                    <?php echo CHtml::Button($seguro->isNewRecord ? 'Guardar' : 'Actualizar',array('class'=>'btn btn-primary','id'=>'btnConvenio_Insti','disabled'=>'disabled')); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->endWidget(); ?>
<div class="modal fade in" id="PacientesAsegurados" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Elija el Titular de Beneficiario</h4>
            </div>
            <div class="modal-body"">
                <div id="conte">
                <?php $this->renderPartial("listapacienteAsegurados",array('listapacientesasegurados'=>$listapacientesasegurados))?>
                </div>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>




