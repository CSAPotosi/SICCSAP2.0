<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidad-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
    'action'=>($unidad->isNewRecord ? yii::app()->createUrl("/Unidad/Create"):yii::app()->createUrl("/unidad/Update",array('id'=>$unidad->id_unidad))),
)); ?>
<div class="box-body">
	<?php echo $form->errorSummary($unidad,null,null,array('class'=>'alert alert-error')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($unidad,'Nombre de la unidad'); ?>
	    <?php echo $form->textField($unidad,'nombre_unidad',array('class'=>'form-control','placeholder'=>'nombre unidad')); ?>
		<?php echo $form->error($unidad,'nombre_unidad',array('class'=>'label label-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($unidad,'Descripcion de Unidad'); ?>
	    <?php echo $form->textField($unidad,'descripcion_unidad',array('class'=>'form-control','placeholder'=>'descripcion unidad')); ?>
		<?php echo $form->error($unidad,'descripcion_unidad',array('class'=>'label label-danger')); ?>
	</div>

</div>
<?php $this->endWidget(); ?>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10">
                <?php echo CHtml::submitButton($unidad->isNewRecord ? 'Guardar' : 'Actualizar',array('class'=>'btn btn-primary','id'=>'btnunidad')); ?>
            </div>
        </div>
    </div>
</div>
