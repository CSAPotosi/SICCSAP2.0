<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <div class="row">
            <div class="box box-primary box-solid">
                <div class="box-header">
                    Paciente de Emergencia
                </div>
                <div class="box-body">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'emergencia-form',
                        'enableAjaxValidation'=>false,
                        'action'=>yii::app()->createUrl("historialpaciente/CrearPacienteEmergencia"),
                    )); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'Documento'); ?>
                                        <?php echo $form->textField($persona,'dni',array('class'=>'form-control','placeholder'=>'Documento')); ?>
                                        <?php echo $form->error($persona,'dni',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'Tipo de Documento'); ?>
                                        <?php echo $form->dropDownList($persona,'dni',array(''=>'Seleccione','dni'=>'Documento de Ientificacion Perosnal','pasaporte'=>'pasaporte'),array('class'=>'form-control')); ?>
                                        <?php echo $form->error($persona,'dni',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'Nombres'); ?>
                                        <?php echo $form->textField($persona,'nombres',array('class'=>'form-control','placeholder'=>'Nombres')); ?>
                                        <?php echo $form->error($persona,'nombres',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'Primer Apellido'); ?>
                                        <?php echo $form->textField($persona,'primer_apellido',array('class'=>'form-control','placeholder'=>'Primer Apellido')); ?>
                                        <?php echo $form->error($persona,'primer_apellido',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'Segundo Apellido'); ?>
                                        <?php echo $form->textField($persona,'segundo_apellido',array('class'=>'form-control','placeholder'=>'Segundo Apellido')); ?>
                                        <?php echo $form->error($persona,'segundo_apellido',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'fecha_nacimiento'); ?>
                                        <div class="input-group date" id="datetimepicker1">
                                            <input class="form-control" type="text"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar">
                                                    </span>
                                                </span>
                                        </div>
                                        <?php echo $form->error($persona,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-offset-2">
                                    <br>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($persona,'SEXO'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        MASCULINO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radiobutton($persona,'sexo',array('value'=>'Masculino'))?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        FEMENINO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radiobutton($persona,'sexo',array('value'=>'Femenino'))?>
                                        <?php echo $form->error($persona,'sexo',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $date=date("Y-m-d")?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                    <div class="form-group">
                        <div class="col-md-offset-0 col-md-12">
                            <input class="btn btn-primary " type="button" value="Generar Historial Medico" id="botonemergencia">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('form_emergencia','
    $(function(){
        $("#datetimepicker1").datetimepicker({
            locale:"es",
            defaultDate:'.date("d-m-Y").',
            format:"DD-MM-YYYY HH:mm A",
            maxDate:'.$date.'
        });
        $("input[type=\'radio\'],input[type=\'radio\']").iCheck({
            checkboxClass:"icheckbox_flat-blue",
            radioClass:"iradio_flat-blue"
        });
        $("#botonemergencia").on("click",function(){
            $("#emergencia-form").submit();
        });
    });

',CClientScript::POS_END);
?>