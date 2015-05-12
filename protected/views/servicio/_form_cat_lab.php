<input id="flag" type="hidden" value="1">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
               <div class="contenedorformcatlab" id="contenedorformcatlab">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>($cat_lab->isNewRecord ?'categorialab-form':'categorialab-form-update'),
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )); ?>
                    <?php echo CHtml::errorSummary($cat_lab,null,null,array('class'=>'alert alert-error')); ?>
                    <?php echo CHtml::activeHiddenField($cat_lab,'id_cat_lab',array()); ?>
                        <div class="form-group">
                            <?php echo CHtml::activelabelEx($cat_lab,'Codigo de categoria'); ?>
                            <?php echo CHtml::activetextField($cat_lab,'codigo_cat_lab',array('class'=>'form-control','placeholder'=>'Codigo de la Categiria de Laboratorio')); ?>
                            <?php echo CHtml::error($cat_lab,'codigo_cat_lab',array('class'=>'label label-danger')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo CHtml::activelabelEx($cat_lab,'Nombre de la Categoria'); ?>
                            <?php echo CHtml::activetextField($cat_lab,'nombre_cat_lab',array('class'=>'form-control','placeholder'=>'Nombre de la Categoria de Laboratorio')); ?>
                            <?php echo CHtml::error($cat_lab,'nombre_cat_lab',array('class'=>'label label-danger')); ?>
                        </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>