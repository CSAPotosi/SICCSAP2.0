<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>\n"; ?>
<div class="box-body">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model,null,null,array('class'=>'alert alert-error')); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="form-group">
		<?php echo "<?php echo \$form->labelEx(\$model,'{$column->name}',array('class'=>'col-md-2 control-label')); ?>\n"; ?>
		<div class="col-sm-8">
			<?php echo "<?php echo \$form->textField(\$model,'{$column->name}',array('class'=>'form-control','placeholder'=>'{$column->name}')); ?>\n";?>
		</div>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}',array('class'=>'label label-danger')); ?>\n"; ?>
	</div>

<?php
}
?>
</div>
	<div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
				<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?>\n"?>
                
            </div>
        </div>
    </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->