<div class="col-md-12">
	<div class="box box-primary">
        <?php $form=$this->beginWidget('CActiveForm', array(
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
            <?php
            /* @var $this PersonaController */
            /* @var $model Persona */

            $this->breadcrumbs=array(
                'Personas'=>array('index'),
                'Create',
            );
            ?>
            <center><h1>Crear Persona</h1></center>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>

            <?php $this->renderPartial('_formEspecialidad', array('modelE'=>$modelE)); ?>
        <div class="row" id="box1">
            <?php $this->renderPartial('_formMedico', array('modelM'=>$modelM,'items'=>$items)); ?>
        </div>
        <div class="row" id="box2">
            <?php $this->renderPartial('_formPaciente', array('modelH'=>$modelH)); ?>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label>
                    <input type="checkbox" id="checkbox" value="option1">
                    Medico
                </label>
                <label>
                    <input type="checkbox" id="checkbox1" value="option1">
                    Paciente
                </label>
            </div>

        </div>


        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6" >
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg'));?>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    </div>


</div>
<button id="checkbox2">Llenar informnacion</button>
<script>
    $(document).ready(function(){

        $("#box1").hide();
        $("#box2").hide();
        $("#checkbox2").click(function(){
            if($('#checkbox').is(":checked")){
                $('#box1').show();
            }
            if($("#checkbox1").is(":checked")){
                $("#box2").show();
            }
        });
    });
</script>