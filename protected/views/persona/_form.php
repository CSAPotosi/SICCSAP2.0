<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'persona-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,

    )); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h2><center><b><p class="note">Los Campos com <span class="required">*</span> son Obligatorios</p></b></center></h2>
                <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>
            </div>
        </div>

        <div  class="row">
            <div class="col-md-3">
                <?php $this->widget('zii.widgets.XPhoto',array(
                    'model'=>$model,
                    'attribute'=>'fotografia',
                    'photoUrl'=>($model->isNewRecord)?null:Yii::app()->baseUrl.'/fotografias/'.$model->fotografia,

                ));?>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'dni'); ?>
                    <?php echo $form->textField($model,'dni',array('class'=>'form-control','placeholder'=>'dni')); ?>
                    <?php echo $form->error($model,'dni',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'nombres'); ?>
                    <?php echo $form->textField($model,'nombres',array('class'=>'form-control','placeholder'=>'nombres')); ?>
                    <?php echo $form->error($model,'nombres',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'primer_apellido'); ?>
                    <?php echo $form->textField($model,'primer_apellido',array('class'=>'form-control','placeholder'=>'primer_apellido')); ?>
                    <?php echo $form->error($model,'primer_apellido',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'segundo_apellido'); ?>
                    <?php echo $form->textField($model,'segundo_apellido',array('class'=>'form-control','placeholder'=>'segundo_apellido')); ?>
                    <?php echo $form->error($model,'segundo_apellido',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'sexo'); ?>
                    <?php echo $form->RadioButtonList($model,'sexo',$model->getSexo(),array('class'=>'form-control','template'=>'{input} {label}'));?>
                    <?php echo $form->error($model,'sexo',array('class'=>'label label-danger')); ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'fecha_nacimiento'); ?>
                    <div class="input-group date" id="datetimepicker1">
                        <input class="form-control" type="text"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                    <?php echo $form->error($model,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'estado_civil'); ?>
                    <?php echo $form->dropDownList($model,'estado_civil',$model->getEstadoCivil(),array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'estado_civil',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'pais_nacimiento'); ?>
                    <?php echo $form->dropDownList($model,'pais_nacimiento',$model->getPais(),array('class'=>'form-control','prompt'=>'seleccione'))?>
                    <?php echo $form->error($model,'pais_nacimiento',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'provincia'); ?>

                        <?php echo $form->textField($model,'provincia',array('class'=>'form-control','placeholder'=>'Provincia/Departamento')); ?>
                    <?php echo $form->error($model,'provincia',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'localidad'); ?>

                        <?php echo $form->textField($model,'localidad',array('class'=>'form-control','placeholder'=>'localidad')); ?>

                    <?php echo $form->error($model,'localidad',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'nivel_estudio'); ?>
                    <?php echo $form->dropDownList($model,'nivel_estudio',$model->getNivelestudio(),array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'nivel_estudio',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'pais_vive'); ?>

                        <?php echo $form->dropDownList($model,'pais_vive',$model->getPais(),array('class'=>'form-control','prompt'=>'seleccione'))?>

                    <?php echo $form->error($model,'pais_vive',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'direccion'); ?>

                        <?php echo $form->textField($model,'direccion',array('class'=>'form-control','placeholder'=>'direccion')); ?>

                    <?php echo $form->error($model,'direccion',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'telefono'); ?>

                        <?php echo $form->textField($model,'telefono',array('class'=>'form-control','placeholder'=>'telefono')); ?>

                    <?php echo $form->error($model,'telefono',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'celular'); ?>

                        <?php echo $form->textField($model,'celular',array('class'=>'form-control','placeholder'=>'celular')); ?>

                    <?php echo $form->error($model,'celular',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'email'); ?>

                        <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'email')); ?>

                    <?php echo $form->error($model,'email',array('class'=>'label label-danger')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar Datos Personales' : 'Actualizar Datos Personales',array('class'=>'btn btn-primary btn-lg','id'=>'registro_contacto')); ?>
    </div>

    <?php $this->endWidget(); ?>


</div><!-- form -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/moment.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/bootstrap-datetimepicker.min.js',CClientScript::POS_END);

Yii::app()->clientScript->registerScript('datetime','
    $(function(){
        $("#datetimepicker1").datetimepicker({
        	locale:"es",
        	defaultDate:"04/27/2015",
        	format:"DD-MM-YYYY HH:mm A",
        	maxDate:"04/27/2015"
        });
    });
',CClientScript::POS_END);
?>