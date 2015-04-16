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
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">
        <h2><center><b><p class="note">Los Campos com <span class="required">*</span> son Obligatorios</p></b></center></h2>

        <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>
        <div class="col-md-3">
            <?php $this->widget('zii.widgets.XPhoto',array(
                'model'=>$model,
                'attribute'=>'fotografia',
                'photoUrl'=>($model->isNewRecord)?null:Yii::app()->baseUrl.'/fotografias/'.$model->fotografia,

            ));?>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'codigo',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'codigo',array('class'=>'form-control','placeholder'=>'codigo')); ?>
                    </div>
                    <?php echo $form->error($model,'codigo',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'dni',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'dni',array('class'=>'form-control','placeholder'=>'dni')); ?>
                    </div>
                    <?php echo $form->error($model,'dni',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'nombres',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'nombres',array('class'=>'form-control','placeholder'=>'nombres')); ?>
                    </div>
                    <?php echo $form->error($model,'nombres',array('class'=>'label label-danger')); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'primer_apellido',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'primer_apellido',array('class'=>'form-control','placeholder'=>'primer_apellido')); ?>
                    </div>
                    <?php echo $form->error($model,'primer_apellido',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'segundo_apellido',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->textField($model,'segundo_apellido',array('class'=>'form-control','placeholder'=>'segundo_apellido')); ?>
                    </div>
                    <?php echo $form->error($model,'segundo_apellido',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'sexo',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->RadioButtonList($model,'sexo',$model->getSexo(),array('class'=>'form-control','template'=>'{input} {label}'));?>
                    </div>
                    <?php echo $form->error($model,'sexo',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'fecha_nacimiento',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php
                        $this->widget(
                            'ext.jui.EJuiDateTimePicker',
                            array(
                                'model'     => $model,
                                'attribute' => 'fecha_nacimiento',
                                'language'=> 'es',//default Yii::app()->language
                                'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
                                'options'   => array(
                                    'dateFormat' => 'dd.mm.yy',
                                    'timeFormat' => 'hh:mm tt',// default
                                ),
                                'htmlOptions'=>array('class'=>'form-control','value'=>'01.01.0001 00:00'),
                            )
                        );
                        ?>
                    </div>
                    <?php echo $form->error($model,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'estado_civil',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'estado_civil',$model->getEstadoCivil(),array('class'=>'form-control')); ?>
                    </div>
                    <?php echo $form->error($model,'estado_civil',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'pais_nacimiento',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo $form->dropDownList($model,'pais_nacimiento',$model->getPais(),array('class'=>'form-control'))?>
                    </div>
                    <?php echo $form->error($model,'pais_nacimiento',array('class'=>'label label-danger')); ?>
                </div>

            </div>
        </div>
        <div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'provincia',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'provincia',array('class'=>'form-control','placeholder'=>'Provincia/Departamento')); ?>
                </div>
                <?php echo $form->error($model,'provincia',array('class'=>'label label-danger')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'localidad',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'localidad',array('class'=>'form-control','placeholder'=>'localidad')); ?>
                </div>
                <?php echo $form->error($model,'localidad',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'nivel_estudio',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'nivel_estudio',array('class'=>'form-control','placeholder'=>'nivel_estudio')); ?>
                </div>
                <?php echo $form->error($model,'nivel_estudio',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'pais_vive',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model,'pais_vive',$model->getPais(),array('class'=>'form-control'))?>
                </div>
                <?php echo $form->error($model,'pais_vive',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'direccion',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'direccion',array('class'=>'form-control','placeholder'=>'direccion')); ?>
                </div>
                <?php echo $form->error($model,'direccion',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'telefono',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'telefono',array('class'=>'form-control','placeholder'=>'telefono')); ?>
                </div>
                <?php echo $form->error($model,'telefono',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'celular',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'celular',array('class'=>'form-control','placeholder'=>'celular')); ?>
                </div>
                <?php echo $form->error($model,'celular',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'email',array('class'=>'col-md-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'email')); ?>
                </div>
                <?php echo $form->error($model,'email',array('class'=>'label label-danger')); ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10" >

                <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar Datos Personales' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>

            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->