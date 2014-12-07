<div class="formmedico">
    <?php $formmedico=$this->beginWidget('CActiveForm', array(
        'id'=>'persona-formmedico',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="form-group">
        <?php echo CHtml::activeLabel($medico,'id',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
        <?php echo CHtml::activeTextField($medico,'id',array('class'=>'form-control','placeholder'=>'id')) ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo CHtml::activeLabel($medico,'matricula',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
        <?php echo CHtml::activeTextField($medico,'matricula',array('class'=>'form-control','placeholder'=>'matricula')) ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo CHtml::activeLabel($medico,'colegiatura',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
        <?php echo CHtml::activeTextField($medico,'colegiatura',array('class'=>'form-control','placeholder'=>'colegiatura')) ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo CHtml::activeLabel($medico,'estado',array('class'=>'col-md-2 control-label')); ?>
        <div class="col-sm-8">
        <?php echo CHtml::activeTextField($medico,'estado',array('class'=>'form-control','placeholder'=>'estado')) ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

