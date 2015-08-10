<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Asignacion a Empleado
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'form-asignacion-empleado',
                'enableAjaxValidation'=>false,
                'htmlOptions'=>array('class'=>'form-horizontal'),
                'action'=>($asignacion->isNewRecord ? yii::app()->createUrl("registro/CrearAsignacion"):yii::app()->createUrl("/registro/ActualizarAsignacion",array('id'=>$asignacion->id_asigancion))),
            )); ?>
            <div class="box-body">
                <div class="callout callout-danger">
                    <h4>Empleado:</h4>
                    <span><?php echo $empleado->personaempleado->nombreCompleto?></span>
                </div>
                <input type="hidden" value="<?php echo $empleado->id?>" name="AsignacionEmpleado[id_empleado]">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($asignacion,'Horario Disponibles'); ?>
                        <?php echo $form->DropDownList($asignacion,'id_horario',$asignacion->getHorario($empleado->id),array('class'=>'form-control')); ?>
                        <?php echo $form->error($asignacion,'id_horario',array('class'=>'label label-danger')); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->labelEx($asignacion,'Cargo Disponibles');?>
                        <?php echo $form->DropDownList($asignacion,'id_cargo',$asignacion->getCargo($empleado->id),array('class'=>'form-control')); ?>
                        <?php echo $form->error($asignacion,'id_cargo',array('class'=>'label label-danger')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <?php echo $form->labelEx($asignacion,'fecha_inicio'); ?>
                            <div class="input-group date" id="datetimepicker1" ">
                                <input name="AsignacionEmpleado[fecha_inicio]" class="form-control" type="text" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                            </div>
                            <?php echo $form->error($asignacion,'fecha_inicio',array('class'=>'label label-danger')); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="button" class="btn btn-primary" value="Asignara Horario y Cargo" id="btnasignacionempleado">
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('datetime','
    $(function(){
        $("#datetimepicker1").datetimepicker({
        	locale:"es",
        	defaultDate:"'.date('Y-m-d H:i').'",
        	format:"YYYY-MM-DD HH:mm",
        	minDate:"'.date('Y-m-d H:i').'"
        });
        $("#btnasignacionempleado").on("click",function(){
            $("#form-asignacion-empleado").submit();
        });
    });
');
