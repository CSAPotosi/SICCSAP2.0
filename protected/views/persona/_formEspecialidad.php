
<div class="modal fade bs-example-modal-lg" id="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'persona-formEspecialidad',
                'action'=>Yii::app()->createUrl('Persona/CrearEspecialidad'),
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <center><h1>Crear Especialidad</h1></center>
            <div class="form" >
                <div class="box-body">
                    <p class="note">Fields with <span class="required">*</span> are required.</p>
                    <?php echo CHtml::errorSummary($modelE,null,null,array('class'=>'alert alert-error')); ?>
                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelE,'nombre_especialidad',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelE,'nombre_especialidad',array('class'=>'form-control','placeholder'=>'nombre_especialidad')); ?>
                        </div>
                        <?php echo CHtml::error($modelE,'nombre_especialidad',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelE,'descripcion',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelE,'descripcion',array('class'=>'form-control','placeholder'=>'descripcion')); ?>
                        </div>
                        <?php echo CHtml::error($modelE,'descripcion',array('class'=>'label label-danger')); ?>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" >
                            <?php echo CHtml::Button($modelE->isNewRecord ? 'Create' : 'Save',
                                array(
                                 'id'=>'boton',
                                'ajax'=>array(
                                'type'=>'post',
                                'url'=>$this->createUrl('persona/CrearEspecialidad'),
                                'update'=>'#'.CHtml::activeId($modelE,''),
                            ),'class'=>'btn btn-primary btn-lg')); ?>
                        </div>
                    </div>
                </div>

            </div><!-- form -->
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
<script>
    $(document).ready(function(){
        $( "#boton" ).click(function() {
            $( "#dialog" ).modal('toggle');
        });
    });

</script>