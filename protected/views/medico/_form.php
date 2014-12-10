<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js" ></script>

<?php
/* @var $this MedicoController */
/* @var $model Medico */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medico-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($modelM,null,null,array('class'=>'alert alert-error')); ?>

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
        <div class="col-sm-1">
        <?php foreach($items as $item): ?>

            <?php echo CHtml::dropDownList($item,'[]id_especialidad',CHtml::listData( Especialidad::model()->findAll(),'id_especialidad','nombre_especialidad')); ?>
            <?php echo CHtml::error($item,'[]id_especialidad'); ?>
        <?php endforeach; ?>
         </div>
    </div>
</div>
	<div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
				<?php echo CHtml::submitButton($modelM->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>
</div>
    <script>
        $(document).ready(function(){
            $("#addEspecialidad").click(function(e){
                e.preventDefault();
                var label='<?php echo CHtml::activelabelEx(MedicoEspecialidad::model(),"[]id_especialidad"); ?>';
                var lista='<?php echo str_replace("\n","",CHtml::activedropDownList(MedicoEspecialidad::model(),"[]id_especialidad",CHtml::listData( Especialidad::model()->findAll(),"id_especialidad","nombre_especialidad"))); ?>';
                $("#especialidad").append(label);
                $("#especialidad").append(lista);
            });
        });
    </script>
</div><!-- form -->