<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js" ></script>
<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="box-body">

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo CHtml::errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <?php echo CHtml::activelabelEx($model,'dni',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-sm-9">
                <?php echo CHtml::activetextField($model,'dni',array('class'=>'form-control','placeholder'=>'D.N.I.')); ?>
            </div>
            <?php echo CHtml::error($model,'dni',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::activelabelEx($model,'nit',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-sm-9">
                <?php echo CHtml::activetextField($model,'nit',array('class'=>'form-control','placeholder'=>'NIT')); ?>
            </div>
            <?php echo CHtml::error($model,'nit',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activelabelEx($model,'nombres',array('class'=>'col-md-3 control-label')); ?>
            <div class="col-sm-9">
                <?php echo CHtml::activetextField($model,'nombres',array('class'=>'form-control','placeholder'=>'NOMBRES')); ?>
            </div>
            <?php echo CHtml::error($model,'nombres',array('class'=>'label label-danger')); ?>
        </div>
    </div>
    <div class="col-md-2" >
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/files/hce/default.jpg" class="img-responsive img-thumbnail col-sm-12" />
    </div>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'primer_apellido',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'primer_apellido',array('class'=>'form-control','placeholder'=>'PRIMER APELLIDO')); ?>
    </div>
    <?php echo CHtml::error($model,'primer_apellido',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'segundo_apellido',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'segundo_apellido',array('class'=>'form-control','placeholder'=>'SEGUNDO APELLIDO')); ?>
    </div>
    <?php echo CHtml::error($model,'segundo_apellido',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'sexo',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activedropDownList($model,'sexo',$model->getSexo(),array('class'=>'form-control','placeholder'=>'Elige una opcion de sexo')); ?>
    </div>
    <?php echo CHtml::error($model,'sexo',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'fecha_nacimiento',array('class'=>'col-md-2 control-label')); ?>
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
    <?php echo CHtml::error($model,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'estado_civil',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activedropDownList($model,'estado_civil',$model->getEstadoCivil(),array('class'=>'form-control')); ?>
    </div>
    <?php echo CHtml::error($model,'estado_civil',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'pais',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">

        <?php echo CHtml::activedropDownList($model,'pais',$model->getPais(),array('class'=>'form-control'))?>
    </div>
    <?php echo CHtml::error($model,'pais',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'provincia',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'provincia',array('class'=>'form-control','placeholder'=>'PROVINCIA')); ?>
    </div>
    <?php echo CHtml::error($model,'provincia',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'localidad',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'localidad',array('class'=>'form-control','placeholder'=>'LOCALIDAD')); ?>
    </div>
    <?php echo CHtml::error($model,'localidad',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'telefono',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'telefono',array('class'=>'form-control','placeholder'=>'TELEFONO FIJO')); ?>
    </div>
    <?php echo CHtml::error($model,'telefono',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'celular',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'celular',array('class'=>'form-control','placeholder'=>'TELEFONO MOVIL')); ?>
    </div>
    <?php echo CHtml::error($model,'celular',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'email',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'email',array('class'=>'form-control','placeholder'=>'CORREO ELECTRONICO')); ?>
    </div>
    <?php echo CHtml::error($model,'email',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::activelabelEx($model,'fotografia',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo CHtml::activetextField($model,'fotografia',array('class'=>'form-control','placeholder'=>'fotografia')); ?>
    </div>
    <?php echo CHtml::error($model,'fotografia',array('class'=>'label label-danger')); ?>
</div>
<br>
</div><!-- form -->



