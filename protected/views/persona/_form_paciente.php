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

        <input type="hidden" value="<?php echo $lastid;?>" name="Paciente[id_paciente]">
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
                       <input class="form-control" type="text" id="nomcont" value="<?php echo ($paciente->id_paciente!=null ? ($paciente->id_contacto_paciente=="" ? "":$paciente->idContactoPaciente->nombreCompleto): "");?>" disabled="disabled">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-body" id="contenedormodalcontacto">
                                <?php $this->renderPartial('_form_contacto',array('contacto'=>new Persona,'valorcontacto'=>"0",'id_persona_contacto'=>"",'nombre_completo'=>"")); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer clearfix" id="btnfootercontacto">
                <?php echo CHtml::Button('Guardar',array('id'=>'btncontacto','class'=>'btn btn-primary pull-left')); ?>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="cancelarcontacto">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('Controlcontacto','
    $(document).ready(function(){
         $(\'#btncontacto\').click(function(){
             var data=$("#persona-form-contacto").serialize();
             $.ajax({
                 url: \''.CHtml::normalizeUrl(array("/Persona/Crearcontacto",)).'\',
                 type: \'post\',
                 data: data,
                 success: function(datos)
                 {
                    $("#contenedormodalcontacto").html(datos);
                    if($("#campocontacto").val()==1){
                        $(\'#contacto\').modal(\'toggle\');
                        $("#persona-form-contacto")[0].reset();
                        $("#id_cont").val($("#id_persona_contacto").val());
                        $("#nomcont").val($("#nombre_completo").val());
                    }
                    $("#buscacontacto").on("keyup",buscarContacto);
                 }
             });
             return false;
         });
         $(\'#cancelarcontacto\').click(function(){
             var data=$("#persona-form-contacto").serialize();
             $.ajax({
                 url: \''.CHtml::normalizeUrl(array("/Persona/Nc",)).'\',
                 type: \'post\',
                 data: data,
                 success: function(datos)
                 {
                    $("#contenedormodalcontacto").html(datos);
                    $(\'#contacto\').modal(\'toggle\');
                    $("#buscacontacto").on("keyup",buscarContacto);
                 }
             });
             return false;
         });

        $("#buscacontacto").on("keyup",buscarContacto);
        function buscarContacto(){
            var control=$(this);
            var cad=control.val();
               if(cad.length>4||cad.length==0){
                    ajaxBuscaContacto(control);
               }
        };
        function ajaxBuscaContacto(control){
            $.ajax({
               beforeSend:function(){
                $("#contenidoListaContactos").append($("<div class=\'overlay\'>"));
                $("#contenidoListaContactos").append($("<div class=\'loading-img\'>"));
               },
               url:"'.CHtml::normalizeUrl(array('persona/buscarContactoAjax')).'",
               type:"post",
               data:{cadena:control.val()},
               success:function(datos){
                  $("#contenidoListaContactos").html(datos);
                  $("tr").on("click",function(){
                      var id = $(this).attr("data");
                      var nombre = $(this).attr("datanom");
                      $("#id_cont").val(id);
                      $("#nomcont").val(nombre);
                      $(\'#contacto\').modal(\'toggle\');
                  });

               },
               complete:function(){
                  $(".overlay").remove();
                  $(".loading-img").remove();
               }
            });
            return false;
        }
        });
');?>