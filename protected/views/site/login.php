

<div class="col-md-3 text-center col-centered">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>


    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <?php echo $form->textField($model,'username',array('class'=>'form-control col-md-10 input-lg ','placeholder'=>'USUARIO')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-key"></i></div>
            <?php echo $form->passwordField($model,'password',array('class'=>'form-control col-md-10 input-lg','placeholder'=>'PASSWORD')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Ingresar',array('class'=>'btn btn-default btn-lg')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>