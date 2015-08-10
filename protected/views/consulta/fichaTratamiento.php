<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */
$model=HistorialPaciente::model()->findByPk($his);


$this->breadcrumbs=array(
    'Pacientes'=>array('persona/index'),
    'CSA-'.$model->paciente->personapa->codigo,
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/index']).' Historia clinica - Antecedentes';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$model))?>

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
                <li><?php echo CHtml::link("<i class='fa fa-list'></i> Historia clinica",array('historialPaciente/view','id'=>$model->id_historial))?></li>
                <li class="active"><?php echo CHtml::link('<i class="fa fa-h-square"></i> Antecedentes',['consulta/viewAntecedente','hid'=>$model->id_historial]);?></li>
                <li><?php echo CHtml::link("<i class='fa fa-stethoscope'></i> Nueva consulta",array('consulta/','hid'=>$model->id_historial));?></li>
                <li><?php echo ($model->paciente->estado_paciente!='INTERNADO')?CHtml::link("<i class='fa fa-wheelchair'></i> Nueva internacion",['internacion/createInternacion','id'=>$model->id_historial]):CHtml::link("<i class='fa fa-wheelchair'></i> Internacion actual",['internacion/index','id'=>$model->internacionActual->id_inter]); ?></li>
                <li class="dropdown">
                    <?php echo CHtml::link('Quirofanos <span class="caret"></span>',['#'],['class'=>'dropdown-toggle animate','data-toggle'=>'dropdown']);?>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo CHtml::link('Programar cirugia',['cirugia/programarCirugia','id_h'=>$model->id_historial]);?></li>
                        <li><?php echo CHtml::link('Registrar cirugia',['cirugia/createCirugia','id_h'=>$model->id_historial]);?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="box box-solid box-primary">
    <div class="modal fade bs-example-modal-lg" id="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <?php $this->renderPartial('/Consulta/_form_tipo_antecedente',array('TipoAntecedente'=>$TipoAntecedente,'consultaModel'=>$consultaModel,'genero'=>$genero));?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('Antecedentes',array('listaante'=>$listaante,'listaAntecedenteMedico'=>$listaAntecedenteMedico,'AntecedenteMedico'=>$AntecedenteMedico,'his'=>$his))?>

</div>