<div class="col-md-12">
    <div class="box box-primary">


<?php $form=$this->beginWidget('ext.jui.TbActiveForm', array(
    'id'=>'importemployees-form',
    'enableAjaxValidation'=>true,
    'type'=>'horizontal',
    'htmlOptions'=>array("enctype"=>"multipart/form-data"),

)); ?>
    <center><h1><b>Importar Asistencia</b></h1></center><br>
    <div class="form-group">
        <?php echo $form->LabelEx($model,'archivo',array('class'=>'col-sm-5 control-label'));?>
        <?php echo $form->fileField($model,'archivo');?>
        <?php echo $form->error($model,'archivo');?>
    </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <?php echo CHtml::submitButton('subir archivo',array('class'=>'btn btn-primary'));?>
                </div>
            </div>
     </div>
<?php $this->endWidget(); ?>
    </div>
</div>
