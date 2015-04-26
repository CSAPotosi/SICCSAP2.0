<?php
/* @var $this HistorialPacienteController */
/* @var $paciente HistorialPaciente */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'historial-paciente-form','action'=>($paciente->isNewRecord ? yii::app()->createUrl("persona/Crearpaciente"):yii::app()->createUrl("persona/_form_updatepa&id=".$paciente->id_paciente)),
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">


        <?php echo $form->errorSummary($paciente,null,null,array('class'=>'alert alert-error')); ?>

        <input type="hidden" value="<?php echo $lastid?>" name="Paciente[id_paciente]">
        <div class="form-group">
            <?php echo $form->labelEx($paciente,'ocupacion_paciente',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($paciente,'ocupacion_paciente',array('class'=>'form-control','placeholder'=>'Ocupacion Paciente')); ?>
            </div>
            <?php echo $form->error($paciente,'ocupacion_paciente',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($paciente,'grupo_sanguineo_paciente',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->dropDownList($paciente,'grupo_sanguineo_paciente',$paciente->getTiposangre(),array('class'=>'form-control')); ?>
            </div>
            <?php echo $form->error($paciente,'grupo_sanguineo_paciente',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($paciente,'estado_paciente',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($paciente,'estado_paciente',array('class'=>'form-control','placeholder'=>'Tipo Paciente')); ?>
            </div>
            <?php echo $form->error($paciente,'estado_paciente',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <?php echo $form->hiddenField($paciente,'id_contacto_paciente',array('class'=>'form-control','id'=>'id_cont')); ?>
            </div>
            <div class="col-sm-8">
                <div class="input-group margin" id="input-contacto">
                    <div class="input-group-btn">
                       <?php echo CHtml::Button($paciente->isNewRecord ? 'Registrar Contacto de paciente' : 'Actualizar Contacto de paciente',array('class'=>"btn btn-warning", 'data-toggle'=>'modal', 'data-target'=>'#contacto')); ?>
                       <input class="form-control" type="text" id="nomcont" value="<?php echo ($paciente->id_paciente!=null ? $paciente->idContactoPaciente->nombreCompleto: "");?>" disabled="disabled">
                    </div>
                </div>
                <div id="id_contacto_persona">

                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-0 col-sm-10">
                <?php echo CHtml::submitButton($paciente->isNewRecord ? 'Generar Historial Medico' : 'Actualizar Historial Medico',array('class'=>'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<div class="modal fade in" id="contacto" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">
                    Registrar contacto de Paciente
                </h4>
            </div>
            <div class="modal-body">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'persona-form-contacto',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array('class'=>'form-horizontal'),
                )); ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo $form->textField($contacto,'dni',array('class'=>'form-control text-center','placeholder'=>'dni')); ?>
                    </div>
                    <?php echo $form->error($contacto,'dni',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo $form->textField($contacto,'nombres',array('class'=>'form-control text-center','placeholder'=>'nombres')); ?>
                    </div>
                    <?php echo $form->error($contacto,'nombres',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo $form->textField($contacto,'primer_apellido',array('class'=>'form-control text-center','placeholder'=>'Primer Apellido')); ?>
                    </div>
                    <?php echo $form->error($contacto,'primer_apellido',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">

                    <div class="col-sm-12">
                        <?php echo $form->textField($contacto,'segundo_apellido',array('class'=>'form-control text-center','placeholder'=>'Segundo Apellido')); ?>
                    </div>
                    <?php echo $form->error($contacto,'segundo_apellido',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><b>Fecha de Nacimiento:</b></span>
                            <?php echo $form->dateField($contacto,'fecha_nacimiento',array('class'=>'form-control text-center','for')); ?>
                        </div>
                    </div>
                    <?php echo $form->error($contacto,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo $form->textField($contacto,'direccion',array('class'=>'form-control text-center','placeholder'=>'Direccion')); ?>
                    </div>
                    <?php echo $form->error($contacto,'direccion',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">

                    <div class="col-sm-12">
                        <?php echo $form->textField($contacto,'telefono',array('class'=>'form-control text-center','placeholder'=>'Telefono')); ?>
                    </div>
                    <?php echo $form->error($contacto,'telefono',array('class'=>'label label-danger')); ?>
                </div>
                <input id="Persona_fotogradia" name="Persona[fotografia]" type="hidden" value="no-photo.png">
                <?php echo CHtml::Button('Guardar',
                    array('id'=>'btncontacto','class'=>'btn btn-primary pull-left')); ?>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>

                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer clearfix">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#btncontacto').click(function(){
            $('#contacto').modal('toggle');
            $('#persona-form')[0].reset();
        })
    })
</script>
<?php Yii::app()->clientScript->registerScript('ControlAntecedentes','
    $(document).ready(function(){
         $(\'#btncontacto\').click(function(){
             var data=$("#persona-form-contacto").serialize();
             $.ajax({
                 url: \''.CHtml::normalizeUrl(array("/Persona/Crearcontacto",)).'\',
                 type: \'post\',
                 data: data,
                 success: function(datos)
                 {
                 $("#id_cont").val(""+datos.id_contacto+"");
                 $("#nomcont").val(""+datos.nombre_contacto+"");
                 }
             });
             return false;
         });
         $(\'#btncontacto\').click(function(){
            $(\'#contacto\').modal(\'toggle\');
            $(\'#persona-form\')[0].reset();
        })
    });
');?>