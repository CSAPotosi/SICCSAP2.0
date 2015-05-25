<?php
/* @var $this InternacionController */

$this->breadcrumbs=array(
	'Internacion',
);

$this->pageTitle='Internacion';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo CHtml::link('Datos Generales',array('internacion/createInternacion'),array('class'=>'btn btn-block btn-bitbucket'));?>
                    </div>

                    <div class="col-md-2">
                        <?php echo CHtml::link('Diagnosticos',array('internacion/createInternacion'),array('class'=>'btn btn-block btn-social btn-bitbucket'));?>
                    </div>

                    <div class="col-md-2">
                        <?php echo CHtml::link('Tratamientos',array('internacion/createInternacion'),array('class'=>'btn btn-block btn-social btn-bitbucket'));?>
                    </div>

                    <div class="col-md-2">
                        <?php echo CHtml::link('Salas',array('internacion/createInternacion'),array('class'=>'btn btn-block btn-bitbucket'));?>
                    </div>

                    <div class="col-md-2">
                        <?php echo CHtml::link('Servicios',array('internacion/createInternacion'),array('class'=>'btn btn-block btn-social btn-bitbucket'));?>
                    </div>

                    <div class="col-md-2">
                        <?php echo CHtml::link('Alta de paciente',array('internacion/createInternacion'),array('class'=>'btn btn-block btn-social btn-bitbucket'));?>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>