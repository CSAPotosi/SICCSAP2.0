<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */

$this->breadcrumbs=array(
	'Historial Pacientes'=>array('index'),
	$model->id_historial,
);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Informacion del Paciente</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo CHtml::image(Yii::app()->baseUrl.'/fotografias/'.$model->idHistorial->personapa->fotografia,null,array('class'=>'img-circle img-thumbnail img-responsive','style'=>'max-width:50px'))?>
                    </div>
                    <div class="col-md-10">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><b>CODIGO DE HISTORIA CLINICA</b></td>
                                    <td><span class="time text-bold">CSA-<?php echo $model->idHistorial->personapa->codigo;?></span></td>
                                </tr>
                                <tr>
                                    <td><b>NOMBRE COMPLETO</b></td>
                                    <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->nombreCompleto;?></span></td>
                                </tr>
                                <tr>
                                    <td><b>OCUPACION / PROFESION</b></td>
                                    <td><span class="time text-bold"><?php echo $model->idHistorial->ocupacion_paciente;?></span></td>
                                </tr>
                                <tr>
                                    <td><b>EDAD</b></td>
                                    <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->edad;$model->idHistorial->personapa->fecha_nacimiento;?></td>
                                </tr>
                                <tr>
                                    <td><b>SEXO</b></td>
                                    <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->sexo;$model->idHistorial->personapa->fecha_nacimiento;?></td>
                                </tr>
                                <tr>
                                    <td><b>DIRECCION</b></td>
                                    <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->direccion;?></span></td>
                                </tr>
                                <div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Ver informacion completa',array('persona/view','id'=>$model->idHistorial->personapa->id),array('class'=>'btn btn-success'));?>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Consultas Medicas Realizadas</h3>
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