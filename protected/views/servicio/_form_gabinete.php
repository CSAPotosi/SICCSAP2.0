<input id="flag" type="hidden" value="1">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="contenedorformgabinete" id="contenedorgabinete">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>($gabinete->isNewRecord ?'gabinete-form':'gabinete-form-update'),
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )); ?>
                    <?php echo CHtml::errorSummary($gabinete,null,null,array('class'=>'alert alert-error')); ?>
                        <?php echo CHtml::activeHiddenField($gabinete,'id_cat_gab'); ?>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($gabinete,'Codigo de Examen Gabinete'); ?>
                        <?php echo CHtml::activetextField($gabinete,'codigo_cat_gab',array('class'=>'form-control','placeholder'=>'Codigo de la Categiria de Laboratorio')); ?>
                        <?php echo CHtml::error($gabinete,'codigo_cat_gab',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($gabinete,'Nombre de la Categoria '); ?>
                        <?php echo CHtml::activetextField($gabinete,'nombre_cat_gab',array('class'=>'form-control','placeholder'=>'Nombre de la Categoria de Laboratorio')); ?>
                        <?php echo CHtml::error($gabinete,'nombre_cat_gab',array('class'=>'label label-danger')); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>