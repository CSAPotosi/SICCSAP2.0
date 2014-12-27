<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js" ></script>

<?php
/* @var $this MedicoController */
/* @var $model Medico */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($modelM,null,null,array('class'=>'alert alert-error')); ?>

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
    <br></br>
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
</div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar una Especialidad</button>
</div>


</div><!-- form -->