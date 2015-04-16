<?php
/* @var $this TipoAntecedenteController */
/* @var $model TipoAntecedente */
/* @var $form CActiveForm */
?>

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
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
            <?php echo $form->dropDownList($model,'genero_aplicado',array('1'=>'masculino','2'=>'Femenino','3'=>'sin Definir')); ?>
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
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('id'=>'boton','class'=>'btn btn-primary btn-lg')); ?>

            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php Yii::app()->clientScript->registerScript('ControlAntecedente','
    $(document).ready(function(){
                $(\'#boton\').click(function(){
                    alert("llega");

                    var data=$("#tipo-antecedente-medico-form").serialize();
                    $.ajax({
                        url: \''.CHtml::normalizeUrl(array("/Consulta/CrearAntecedente","hid"=>$consultaModel->id_historia)).'\',
                        type: \'post\',
                        data: data,
                        success: function(datos)
                        {

                            if(datos.success && datos.titulo!==\'\'){
                                $("#padrepesta").children().removeClass("active");
                                $("#padrecont").children().removeClass("active");
                                var x=datos.nombre_ant;
                                var tag= $(\'<li class="active"><a href="\'+datos.titulo+\'" title="\'+datos.descripcion+\'" data-toggle="tab">\'+datos.titulo+\'</a></li>\').appendTo(\'#padrepesta\');
                                  $(\'<div class="tab-pane fade  active in" id="\'+datos.titulo+\'"><textarea rows="3" style="margin: 0px; width: 1350px; height: 125px;"></textarea></div>\').appendTo(\'#padrecont\');
                                tag.click(function(e){ e.preventDefault();
                                    $(this).tab(\'show\');
                                    $(\'#padrecont\').children().removeClass("active").removeClass(\'in\');
                                    var x=$(this).children(\'a\').attr(\'href\');
                                     $(\'#padrecont\').children().removeClass("active").removeClass(\'in\');
                                     $("#padrecont div:last").addClass("active").addClass(\'in\');
                                });
                                $(\'#dialog\').modal(\'toggle\');
                            }
                            else
                                alert("El campo titulo no puede estar vacio");
                        }
                    });
                    return false;
                });

            });
');?>