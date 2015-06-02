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
                        <?php echo CHtml::link('Alta de paciente',array('internacion/altaMedica','id'=>$modelInternacion->id_inter),array('class'=>'btn btn-block btn-social btn-bitbucket'));?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Historial de salas</h3>
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_tablaSala',['listaSalas'=>$modelInternacion->salas]);?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter],['class'=>'btn btn-primary']);?>
            </div>
        </div>
    </div>
</div>