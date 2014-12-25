<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js" ></script>
<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="box-body">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'persona-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),)); ?>
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
<br>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary" id="caja1">
            <div class="box-header">
                <h2 class="box-title">Medico</h2>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'medico-form1',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array('class'=>'form-horizontal'),
                )); ?>
                <div class="form">
                    <center><p class="note">Los campos con <span class="required">*</span> son obligatorios</p></center>
                    <?php echo $form->errorSummary($modelM,null,null,array('class'=>'alert alert-error')); ?>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'id',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'id',array('class'=>'form-control','placeholder'=>'id')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'id',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'matricula',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'matricula',array('class'=>'form-control','placeholder'=>'matricula')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'matricula',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'colegiatura',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'colegiatura',array('class'=>'form-control','placeholder'=>'colegiatura')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'colegiatura',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'estado',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'estado',array('class'=>'form-control','placeholder'=>'estado')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'estado',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" id="addEspecialidad" class="col-sm-offset-2" >Nueva especialidad</a>
                    </div>
                    <br>
                    <div id="especialidad" class="form-group">
                        <div class="col-sm-1" id="la">
                            <?php foreach($items as $item): ?>
                                <div id="la">
                                    <?php echo CHtml::activedropDownList($item,'[]id_especialidad',CHtml::listData( Especialidad::model()->findAll(),'id_especialidad','nombre_especialidad')
                                    ); ?></div>
                                <?php echo CHtml::error($item,'[]id_especialidad'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar una Especialidad</button>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="box box-primary" id="box1">
            <div class="box-header">
                <h2 class="box-title">Medicos</h2>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'medico-form1',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array('class'=>'form-horizontal'),
                )); ?>
                <div class="form">
                    <center><p class="note">Los campos con <span class="required">*</span> son obligatorios</p></center>
                    <?php echo $form->errorSummary($modelM,null,null,array('class'=>'alert alert-error')); ?>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'id',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'id',array('class'=>'form-control','placeholder'=>'id')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'id',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'matricula',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'matricula',array('class'=>'form-control','placeholder'=>'matricula')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'matricula',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'colegiatura',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'colegiatura',array('class'=>'form-control','placeholder'=>'colegiatura')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'colegiatura',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelM,'estado',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelM,'estado',array('class'=>'form-control','placeholder'=>'estado')); ?>
                        </div>
                        <?php echo CHtml::error($modelM,'estado',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" id="addEspecialidad" class="col-sm-offset-2" >Nueva especialidad</a>
                    </div>
                    <br>
                    <div id="especialidad" class="form-group">
                        <div class="col-sm-1" id="la">
                            <?php foreach($items as $item): ?>
                                <div id="la">
                                    <?php echo CHtml::activedropDownList($item,'[]id_especialidad',CHtml::listData( Especialidad::model()->findAll(),'id_especialidad','nombre_especialidad')
                                    ); ?></div>
                                <?php echo CHtml::error($item,'[]id_especialidad'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar una Especialidad</button>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary" id="caja2">
            <div class="box-header">
                <h2 class="box-title">Paciente</h2>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form">
                    <div class="box-body">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'historial-paciente-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>false,
                            'htmlOptions'=>array('class'=>'form-horizontal'),
                        )); ?>
                        <p class="note">Fields with <span class="required">*</span> are required.</p>

                        <?php echo $form->errorSummary($modelH,null,null,array('class'=>'alert alert-error')); ?>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'id',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'id',array('class'=>'form-control','placeholder'=>'id')); ?>
                            </div>
                            <?php echo $form->error($modelH,'id',array('class'=>'label label-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'ocupacion_paciente',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'ocupacion_paciente',array('class'=>'form-control','placeholder'=>'ocupacion_paciente')); ?>
                            </div>
                            <?php echo $form->error($modelH,'ocupacion_paciente',array('class'=>'label label-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'grupo_sanguineo_paciente',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'grupo_sanguineo_paciente',array('class'=>'form-control','placeholder'=>'grupo_sanguineo_paciente')); ?>
                            </div>
                            <?php echo $form->error($modelH,'grupo_sanguineo_paciente',array('class'=>'label label-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'tipo_paciente',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'tipo_paciente',array('class'=>'form-control','placeholder'=>'tipo_paciente')); ?>
                            </div>
                            <?php echo $form->error($modelH,'tipo_paciente',array('class'=>'label label-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'fecha_muerte',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'fecha_muerte',array('class'=>'form-control','placeholder'=>'fecha_muerte')); ?>
                            </div>
                            <?php echo $form->error($modelH,'fecha_muerte',array('class'=>'label label-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'fecha_creacion',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'fecha_creacion',array('class'=>'form-control','placeholder'=>'fecha_creacion')); ?>
                            </div>
                            <?php echo $form->error($modelH,'fecha_creacion',array('class'=>'label label-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($modelH,'fecha_actualizacion',array('class'=>'col-md-2 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $form->textField($modelH,'fecha_actualizacion',array('class'=>'form-control','placeholder'=>'fecha_actualizacion')); ?>
                            </div>
                            <?php echo $form->error($modelH,'fecha_actualizacion',array('class'=>'label label-danger')); ?>
                        </div>

                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <label>
            <input type="checkbox" id="checkbox" value="option1">
            Medico
        </label>
        <label>
            <input type="checkbox" id="checkbox1" value="option1">
            Paciente
        </label>
    </div>
</div>
<button id="checkbox2">Llenar informnacion</button>
<div class="box-footer">
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6" >
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg'));?>
        </div>
    </div>
</div>
</div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $(document).ready(function(){
        $("#caja1").hide();
        $("#caja2").hide();
        $("#box1").hide();
        $("#checkbox2").click(function(){
            if($('#checkbox').is(":checked")){
                $('#box1').show();
            }
            if($("#checkbox1").is(":checked")){
                $("#caja2").show();
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#addEspecialidad").click(function(e){
            e.preventDefault();
            var label='<?php echo CHtml::activelabelEx(MedicoEspecialidad::model(),"Nombre"); ?>';
            var lista='<?php echo str_replace("\n","",CHtml::activedropDownList(MedicoEspecialidad::model(),"[]id_especialidad",
                                CHtml::listData( Especialidad::model()->findAll(),"id_especialidad","nombre_especialidad"))); ?>';
            $("#especialidad").append(label);
            $("#especialidad").append(lista);
        });
    });

</script>
