<?php
    $this->breadcrumbs=array(
        'Pacientes'=>array('persona/index'),
        'CSA-'.$modelInternacion->historial->paciente->personapa->codigo=>['historialPaciente/view','id'=>$modelInternacion->historial->id_historial],
        'Historia de internacion',
    );
    $this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['historialPaciente/view','id'=>$modelInternacion->historial->id_historial]).' Historial de internacion';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>
<nav class="navbar navbar-menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuHistoria" aria-expanded="false">
                <span class="sr-only">Opciones de historia</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menuHistoria">
            <ul class="nav navbar-nav">
                <li class="active"><?php echo CHtml::link('Datos generales',['internacion/index','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Nuevo diagnostico',['qweqw']);?></li>
                <li><?php echo CHtml::link('Kardex de enfermeria',['evolucionEnfermeria/showKardex','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Servicios',['SolicitudServicios/OrdenInternacion','id'=>$modelInternacion->historial->id_historial]);?></li>
                <li><?php echo CHtml::link('Examenes',['qweqw']);?></li>
                <li><?php echo CHtml::link('Alta',['internacion/altaMedica','id'=>$modelInternacion->id_inter]);?></li>
            </ul>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col-md-6">
        <div class="box box-solid box-success">
            <div class="box-header">
                <h3 class="box-title">Historial de salas</h3>
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_tablaSala',['listaSalas'=>$modelInternacion->salas]);?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter],['class'=>'btn btn-success']);?>
            </div>
        </div>
    </div>
</div>