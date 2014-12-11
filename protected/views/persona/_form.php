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
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <?php echo $form->labelEx($model,'dni',array('class'=>'col-md-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php echo $form->textField($model,'dni',array('class'=>'form-control','placeholder'=>'D.N.I.')); ?>
                </div>
                <?php echo $form->error($model,'dni',array('class'=>'label label-danger')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'nit',array('class'=>'col-md-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php echo $form->textField($model,'nit',array('class'=>'form-control','placeholder'=>'NIT')); ?>
                </div>
                <?php echo $form->error($model,'nit',array('class'=>'label label-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'nombres',array('class'=>'col-md-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php echo $form->textField($model,'nombres',array('class'=>'form-control','placeholder'=>'NOMBRES')); ?>
                </div>
                <?php echo $form->error($model,'nombres',array('class'=>'label label-danger')); ?>
            </div>
        </div>
        <div class="col-md-2" >
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/files/hce/default.jpg" class="img-responsive img-thumbnail col-sm-12" />
        </div>
    </div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'primer_apellido',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'primer_apellido',array('class'=>'form-control','placeholder'=>'PRIMER APELLIDO')); ?>
		</div>
		<?php echo $form->error($model,'primer_apellido',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'segundo_apellido',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'segundo_apellido',array('class'=>'form-control','placeholder'=>'SEGUNDO APELLIDO')); ?>
		</div>
		<?php echo $form->error($model,'segundo_apellido',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sexo',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
            <?php echo $form->dropDownList($model,'sexo',$model->getSexo(),array('class'=>'form-control','placeholder'=>'Elige una opcion de sexo')); ?>
		</div>
		<?php echo $form->error($model,'sexo',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fecha_nacimiento',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
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
                    'htmlOptions'=>array('class'=>'form-control'),
                )
            );
            ?>
		</div>
		<?php echo $form->error($model,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'estado_civil',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
            <?php echo $form->dropDownList($model,'estado_civil',$model->getEstadoCivil(),array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'estado_civil',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pais',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">

            <?php echo $form->dropDownList($model,'pais',$model->getPais(),array('class'=>'form-control'))?>
		</div>
		<?php echo $form->error($model,'pais',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'provincia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'provincia',array('class'=>'form-control','placeholder'=>'PROVINCIA')); ?>
		</div>
		<?php echo $form->error($model,'provincia',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'localidad',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'localidad',array('class'=>'form-control','placeholder'=>'LOCALIDAD')); ?>
		</div>
		<?php echo $form->error($model,'localidad',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'telefono',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'telefono',array('class'=>'form-control','placeholder'=>'TELEFONO FIJO')); ?>
		</div>
		<?php echo $form->error($model,'telefono',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'celular',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'celular',array('class'=>'form-control','placeholder'=>'TELEFONO MOVIL')); ?>
		</div>
		<?php echo $form->error($model,'celular',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'CORREO ELECTRONICO')); ?>
		</div>
		<?php echo $form->error($model,'email',array('class'=>'label label-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fotografia',array('class'=>'col-md-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'fotografia',array('class'=>'form-control','placeholder'=>'fotografia')); ?>
		</div>
		<?php echo $form->error($model,'fotografia',array('class'=>'label label-danger')); ?>
	</div>

</div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg'));?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
