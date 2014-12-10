<script>
    $(document).ready(function(){
        $('#Empleado_dni').keyup(function(){
            $('#Empleado_nit').attr('Value',$('#Empleado_dni').attr('Value'));
            $('#Empleado_id_empleado').attr('Value',$('#Empleado_dni').attr('Value'));
        });
    });
</script>
<div class="col-md-12">
    <div class="box box-primary">
<?php
/* @var $this RegistroController */
/* @var $model Registro */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registro-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <div class="box-body">
        <center><b><p class="note">Los Campos con <span class="required">*</span> Son Obligatorios.</p></b></center>
        <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>
        <div class="form-group">
            <label class="col-md-2 control-label")>Unidad</label>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model,'id1',
                    CHtml::listData( Unidad::model()->findAll(),'id_unidad','nombre_unidad'),
                        array(
                            'ajax'=>array(
                                'type'=>'POST',
                                'url'=>$this->createUrl('Registro/Elegircargo'),
                                'update'=>'#'.CHtml::activeId($model,'id2'),
                            ),
                        )
                );?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label")>Cargo</label>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($model,'id2',array(),
                    array(
                        'ajax'=>array(
                            'type'=>'POST',
                            'url'=>$this->createUrl('Registro/ElegirEmpleado'),
                            'update'=>'#'.CHtml::activeId($model,'id_asignacion'),
                        ),
                    )
                );?>
            </div>
            <?php echo $form->error($model,'id2',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'id_asignacion',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->dropDownList($model,'id_asignacion',array()); ?>
            </div>
            <?php echo $form->error($model,'id_asignacion',array('class'=>'label label-danger')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'fecha',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php
                $this->widget("zii.widgets.jui.CJuiDatePicker",array(
                    "attribute"=>"fecha",
                    "model"=>$model,
                    "language"=>"es",
                    "options"=>array(
                        "dateFormat"=>"dd-mm-yy"
                    )
                ));
                ?>
            </div>
            <?php echo $form->error($model,'fecha',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'hora_asistencia',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <input type="text"  name="Registro[hora_asistencia]" id="Registro_hora_asistencia" class="form-control" data-inputmask='"mask": "99:99 aM"' placeholder="hora asistencia" data-mask/>
            </div>
            <?php echo $form->error($model,'hora_asistencia',array('class'=>'label label-danger')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'observaciones',array('class'=>'col-md-2 control-label')); ?>
            <div class="col-sm-8">
                <?php echo $form->textField($model,'observaciones',array('class'=>'form-control','placeholder'=>'observaciones o comentarios del tickeo')); ?>
            </div>
            <?php echo $form->error($model,'observaciones',array('class'=>'label label-danger')); ?>
        </div>

    </div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <center><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg')); ?></center>

            </div>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

 </div>
    </div>