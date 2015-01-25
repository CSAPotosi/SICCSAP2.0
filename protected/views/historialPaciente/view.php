<?php
/* @var $this HistorialPacienteController */
/* @var $model HistorialPaciente */

$this->breadcrumbs=array(
	'Historial Pacientes'=>array('index'),
	$model->id,
);
?>

<div class="row">
    <div class="col-md-12 connectedSortable ui-sortable">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Informacion de paciente</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
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
    <div class="col-md-6 connectedSortable ui-sortable">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Consultas Medicas Realizadas</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                    <a href="<?php echo $this->createUrl('consulta/'); ?>" class="btn btn-default btn-sm" title="Nueva Consulta"><i class="fa fa-plus"></i></a>
                </div>
            </div>

            <div class="box-body">
                contenido
            </div>

            <div class="box-footer">
                pie
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mi titulo 3   </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
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

    <div class="col-md-6 connectedSortable ui-sortable">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mi titulo 2   </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                conytenido
            </div>

            <div class="box-footer">
                pie
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mi titulo 4   </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
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
                    View HistorialPaciente #<?php echo $model->id; ?>
                </h3>
            </div>
            <div class="box-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'id',
                        'ocupacion_paciente',
                        'grupo_sanguineo_paciente',
                        'tipo_paciente',
                        'fecha_muerte',
                        'fecha_creacion',
                        'fecha_actualizacion',
                    ),
                )); ?>
            </div>
        </div>
    </div>
</div>