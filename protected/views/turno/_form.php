<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turno-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	<?php echo $form->errorSummary($turno,null,null,array('class'=>'alert alert-error')); ?>
	<div class="form-group">
		<?php echo $form->labelEx($turno,'nombre_turno'); ?>
	    <?php echo $form->textField($turno,'nombre_turno',array('class'=>'form-control','placeholder'=>'nombre_turno')); ?>
		<?php echo $form->error($turno,'nombre_turno',array('class'=>'label label-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($turno,'tipo_turno'); ?>
		<?php echo $form->dropDownList($turno,'tipo_turno',$turno->getTipoTurno(),array('class'=>'form-control')); ?>
		<?php echo $form->error($turno,'tipo_turno',array('class'=>'label label-danger')); ?>
	</div>
    <?php  $value=($turno->hora_entrada=="")?"":date("h:i A", strtotime($turno->hora_entrada));   ?>
	<div class="form-group">
		<?php echo $form->labelEx($turno,'hora_entrada'); ?>
        <?php echo $form->textField($turno,'hora_entrada',array('value'=>$value,'class'=>'form-control','data-inputmask'=>'"mask":"99:99 aM"','placeholder'=>'hora','data-mask'=>'data-mask'));?>
		<?php echo $form->error($turno,'hora_entrada',array('class'=>'label label-danger')); ?>
	</div>
    <div class="form-group">
        <?php echo $form->labelEx($turno,'inicio_entrada'); ?>
        <?php echo $form->textField($turno,'inicio_entrada',array('class'=>'form-control','placeholder'=>'Inicio entrada')); ?>
        <?php echo $form->error($turno,'inicio_entrada',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($turno,'fin_entrada'); ?>
        <?php echo $form->textField($turno,'fin_entrada',array('class'=>'form-control','placeholder'=>'Fin entrada')); ?>
        <?php echo $form->error($turno,'fin_entrada',array('class'=>'label label-danger')); ?>
    </div>
    <?php  $value=($turno->hora_salida=="")?"":date("h:i A", strtotime($turno->hora_salida));   ?>
	<div class="form-group">
		<?php echo $form->labelEx($turno,'hora_salida'); ?>
        <?php echo $form->textField($turno,'hora_salida',array('value'=>$value,'class'=>'form-control','data-inputmask'=>'"mask":"99:99 aM"','placeholder'=>'hora','data-mask'=>'data-mask'));?>
		<?php echo $form->error($turno,'hora_salida',array('class'=>'label label-danger')); ?>
	</div>
    <div class="form-group">
        <?php echo $form->labelEx($turno,'inicio_salida'); ?>
        <?php echo $form->textField($turno,'inicio_salida',array('class'=>'form-control','placeholder'=>'Inicio salida')); ?>
        <?php echo $form->error($turno,'inicio_salida',array('class'=>'label label-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($turno,'fin_salida'); ?>
        <?php echo $form->textField($turno,'fin_salida',array('class'=>'form-control','placeholder'=>'Fin salida')); ?>
        <?php echo $form->error($turno,'fin_salida',array('class'=>'label label-danger')); ?>
    </div>
	<div class="form-group">
		<?php echo $form->labelEx($turno,'tolerancia'); ?>
		<?php echo $form->textField($turno,'tolerancia',array('class'=>'form-control','placeholder'=>'tolerancia')); ?>
		<?php echo $form->error($turno,'tolerancia',array('class'=>'label label-danger')); ?>
	</div>
    <div class="form-group">
        <?php echo $form->labelEx($turno,'dias'); ?>
        <?php echo $form->textField($turno,'dias',array('value'=>'1111100','class'=>'form-control','data-inputmask'=>'"mask":"9999999"','placeholder'=>'Dias','data-mask'=>'data-mask')); ?>
        <?php echo $form->error($turno,'dias',array('class'=>'label label-danger')); ?>
    </div>
	<div class="form-group">
		<?php echo $form->labelEx($turno,'id_horario'); ?>
        <?php echo $form->textField($turno,'id_horario',array('class'=>'form-control','placeholder'=>'id_horario','disabled'=>'true')); ?>
		<?php echo $form->error($turno,'id_horario',array('class'=>'label label-danger')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->