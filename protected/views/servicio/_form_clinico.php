<input id="flag" type="hidden" value="1">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="contenedorformclinico" id="contenedorclinico">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>($clinico->isNewRecord ?'clinico-form':'clinico-form-update'),
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )); ?>
                    <?php echo CHtml::errorSummary($clinico,null,null,array('class'=>'alert alert-error')); ?>
                    <?php echo CHtml::activeHiddenField($clinico,'id_cat_cli'); ?>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($clinico,'Codigo se Servico Clinico'); ?>
                        <?php echo CHtml::activetextField($clinico,'codigo_cat_cli',array('class'=>'form-control','placeholder'=>'Codigo de la Categiria de Servicios Clinicos')); ?>
                        <?php echo CHtml::error($clinico,'codigo_cat_cli',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($clinico,'Nombre de la Categoria '); ?>
                        <?php echo CHtml::activetextField($clinico,'nombre_cat_cli',array('class'=>'form-control','placeholder'=>'Nombre de la Categoria de Servicio Clinicos')); ?>
                        <?php echo CHtml::error($clinico,'nombre_cat_cli',array('class'=>'label label-danger')); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>