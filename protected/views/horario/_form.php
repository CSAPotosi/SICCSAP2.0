
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'horario-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
    'action'=>($horario->isNewRecord ? yii::app()->createUrl("/Horario/CrearHorario"):yii::app()->createUrl("/Horario/ActualizarHorario",array('id'=>$horario->id_horario))),
)); ?>
    <div class="box-body">
        <?php echo $form->errorSummary($horario); ?>
        <div class="form-group">
            <?php echo $form->labelEx($horario,'nombre_horario'); ?>
            <?php echo $form->textField($horario,'nombre_horario',array('class'=>'form-control','placeholder'=>'Escribe un nombre para el horario')); ?>            
            <?php echo $form->error($horario,'nombre_horario',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($horario,'descripcion'); ?>
            <?php echo $form->textField($horario,'descripcion',array('class'=>'form-control','placeholder'=>'Escribe un nombre para el horario')); ?>
            <?php echo $form->error($horario,'descripcion',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($horario,'Ciclo de trabajo'); ?>
            <?php echo $form->textField($horario,'total_dias',array('class'=>'form-control','placeholder'=>'Escribe un nombre para el horario')); ?>
            <?php echo $form->error($horario,'total_dias',array('class'=>'label label-danger')); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
             <?php echo CHtml::submitButton($horario->isNewRecord ? 'Guardar' : 'Actualizar',array('class'=>'btn btn-primary','id'=>'btnhorario')); ?>
        </div>
    </div>
    
<?php $this->endWidget(); ?>