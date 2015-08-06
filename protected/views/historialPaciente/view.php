<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('persona/index'),
	'CSA-'.$model->paciente->personapa->codigo,
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/index']).' Historia clinica';
?>

<?php $this->renderPartial('_form_datos_paciente',array('model'=>$model))?>

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
                <li class="active"><?php echo CHtml::link("<i class='fa fa-list'></i> Historia clinica",array('historialPaciente/view','id'=>$model->id_historial))?></li>
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


<div class="row">
    <div class="col-md-6">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">Consultas medicas realizadas</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive">
                <?php $this->widget('zii.widgets.grid.CGridView',array(
                    'dataProvider'=>$listaConsulta,
                    'template'=>'{items}',
                    'itemsCssClass'=>'table table-hover table-bordered dataTable',
                    'columns'=>array(
                        array(
                            'name'=>'Fecha',
                            'value'=>'date("d/m/Y",strtotime($data->fecha_diagnostico))'
                        ),
                        array(
                            'name'=>'Hora',
                            'value'=>'date("h:i A",strtotime($data->fecha_diagnostico))'
                        ),
                        array(
                            'name'=>'Diagnostico',
                            'value'=>'$data->diagnosticoCorto'
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{ver}',
                            'buttons'=>array(
                                'ver'=>array(
                                    'label'=>'<i class="fa fa-eye"></i>',
                                    'url'=>'Yii::app()->createUrl("/consulta",array("hid"=>'.$model->id_historial.',"cid"=>$data->id_consulta))',
                                    'options'=>array('title'=>'Ver Detalles'),
                                ),
                            ),
                        ),
                    ),
                ))?>

            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Ver todo',array('consulta/listConsulta','hid'=>$model->id_historial),array('class'=>'btn btn-primary'));?>
                <?php echo CHtml::link('Nueva Consulta',array('consulta/','hid'=>$model->id_historial),array('class'=>'btn btn-primary pull-right'));?>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mi titulo 2   </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                conytenido
            </div>

            <div class="box-footer">
                pie
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mi titulo 3   </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                conytenido
            </div>

            <div class="box-footer">
                pie
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mi titulo 4   </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                conytenido
            </div>

            <div class="box-footer">
                pie
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    View HistorialPaciente #<?php echo $model->id_historial; ?>
                </h3>
            </div>
            <div class="box-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'id_historial',
                        'fecha_muerte',
                        'fecha_creacion',
                        'fecha_actualizacion',
                    ),
                )); ?>

            </div>
        </div>
    </div>
</div>