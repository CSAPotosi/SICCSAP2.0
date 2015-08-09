<div class="buscador">
            <div class="input-group margin">
                <input class="form-control" type="text" id="buscacontacto" placeholder="CI - Nombres - Fecha de Naciemiento">
                <span class="input-group-btn">
                    <button class="btn btn-info btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                </span>
            </div>
</div>
<div id="contenidoListaContactos">
</div>
<div id="formulario_contacto">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'persona-form-contacto',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <input type="hidden" value="<?php echo $valorcontacto;?>" id="campocontacto">
    <input type="hidden" value="" id="id_persona_contacto">
    <input type="hidden" value="" id="nombre_completo">
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::activetextField($contacto,'dni',array('class'=>'form-control text-center','placeholder'=>'dni')); ?>
        </div>
        <?php echo CHtml::error($contacto,'dni',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::activetextField($contacto,'nombres',array('class'=>'form-control text-center','placeholder'=>'nombres')); ?>
        </div>
        <?php echo CHtml::error($contacto,'nombres',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::activetextField($contacto,'primer_apellido',array('class'=>'form-control text-center','placeholder'=>'Primer Apellido')); ?>
        </div>
        <?php echo CHtml::error($contacto,'primer_apellido',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">

        <div class="col-sm-12">
            <?php echo CHtml::activetextField($contacto,'segundo_apellido',array('class'=>'form-control text-center','placeholder'=>'Segundo Apellido')); ?>
        </div>
        <?php echo CHtml::error($contacto,'segundo_apellido',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon"><b>Fecha de Nacimiento:</b></span>
                <?php echo CHtml::activedateField($contacto,'fecha_nacimiento',array('class'=>'form-control text-center','for')); ?>
            </div>
        </div>
        <?php echo CHtml::error($contacto,'fecha_nacimiento',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::activetextField($contacto,'direccion',array('class'=>'form-control text-center','placeholder'=>'Direccion')); ?>
        </div>
        <?php echo CHtml::error($contacto,'direccion',array('class'=>'label label-danger')); ?>
    </div>

    <div class="form-group">

        <div class="col-sm-12">
            <?php echo CHtml::activetextField($contacto,'telefono',array('class'=>'form-control text-center','placeholder'=>'Telefono')); ?>
        </div>
        <?php echo CHtml::error($contacto,'telefono',array('class'=>'label label-danger')); ?>
    </div>
    <input id="Persona_fotogradia" name="Persona[fotografia]" type="hidden" value="no-photo.png">

    <?php $this->endWidget(); ?>
</div>
<?php Yii::app()->clientScript->registerScript('Controlcontacto1','

');
