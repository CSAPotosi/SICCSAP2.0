
    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'tipo-antecedente-medico-form','method'=>'POST',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
        <center><h1>Tipo de Antecedente</h1></center>
        <div class="box-body">
            <center><b><p class="note">Los campos con<span class="required">*</span> son Requeridos</p></b></center>

            <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model,'titulo',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'titulo',array('class'=>'form-control','placeholder'=>'titulo')); ?>
                </div>
                <?php echo $form->error($model,'titulo',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'genero_aplicado',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model,'genero_aplicado',array('G'=>'General',$genero->sexo[0]=>$genero->sexo),array('options'=>array($genero->sexo[0]=>array('selected'=>true)))); ?>

                </div>
                <?php echo $form->error($model,'genero_aplicado',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'descripcion',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'descripcion',array('class'=>'form-control','placeholder'=>'descripcion')); ?>
                </div>
                <?php echo $form->error($model,'descripcion',array('class'=>'label label-danger')); ?>
            </div>

        </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="boton" class="btn btn-primary btn-lg" type="button">Agregar</button>
                </div>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php Yii::app()->clientScript->registerScript('ControlAntecedentes','
    $(document).ready(function(){
                $(\'#boton\').click(function(){
                    var data=$("#tipo-antecedente-medico-form").serialize();
                    $.ajax({
                        url: \''.CHtml::normalizeUrl(array("/Consulta/CrearAntecedente","hid"=>$consultaModel->id_historia)).'\',
                        type: \'post\',
                        data: data,
                        success: function(datos)
                        {
                            $("#padrepesta").children().removeClass("active");
                            $("#padrecont").children().removeClass("active");

                            if(datos.success && datos.titulo!==\'\'){

                                var x=datos.nombre_ant;
                                var tag= $(\'<li class="active" id="demas"><a href="\'+datos.titulo+\'" title="\'+datos.descripcion+\'" data-toggle="tab">\'+datos.titulo+\'</a></li>\').appendTo(\'#padrepesta\');
                                  $(\'<div class="tab-pane fade  active in" id="\'+datos.titulo+\'"><div id="Layer1" style="width:1350px; height:400px; overflow: scroll;"><table class="table" id="\'+datos.titulo+\'tabla"><tr><th>Tipo Antecedente</th><th>Antecedente</th><th>Fecha de Creacion</th></tr></table></div><form method="post" class="formulario" id="\'+datos.contador+\'"><input type="hidden" name="AntecedenteMedico[id_tipo]" value="\'+datos.id+\'"><textarea rows="3" name="AntecedenteMedico[descripcion_ant]" style="margin: 0px; width: 1350px; height: 125px;"></textarea></form></div>\').appendTo(\'#padrecont\');
                                tag.click(function(e){ e.preventDefault();
                                    $(this).tab(\'show\');
                                    $(\'#padrecont\').children().removeClass("active").removeClass(\'in\');
                                    var x=$(this).children(\'a\').attr(\'href\');
                                    $("#"+x+"").addClass("active").addClass("in");
                                });
                                $(\'#dialog\').modal(\'toggle\');
                            }
                        }
                    });
                    $("#tipo-antecedente-medico-form")[0].reset();
                    return false;
                });

            });
');?>