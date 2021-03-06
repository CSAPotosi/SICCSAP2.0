
<?php
        $this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/index'])."Atras";
        $this->breadcrumbs=array(
            'Pacieste'=>array('index'),
            'Nueva Persona',
        );


$this->menu=array(
    array('label'=>'List Persona', 'url'=>array('index')),
    array('label'=>'Create Persona', 'url'=>array('create')),
    array('label'=>'Update Persona', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Persona', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Persona', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Datos Personales</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>

                </div>
            </div>
            <div class="box-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'codigo',
                        'dni',
                        'nombres',
                        'primer_apellido',
                        'segundo_apellido',
                        'sexo',
                        'fecha_nacimiento',
                        'estado_civil',
                        'pais_nacimiento',
                        'provincia',
                        'localidad',
                        'nivel_estudio',
                        'pais_vive',
                        'direccion',
                        'telefono',
                        'celular',
                        'email',
                    ),
                    'htmlOptions'=>array('class'=>'table table-condensed'),
                )); ?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link("<i class='fa fa-edit'></i></i>Actualizar Datos Personales",array('Persona/_form_updateper','id'=>$model->id),array('class'=>'btn btn-social bg-blue'))?>
            </div>
        </div>
        <?php if($model->paciente!=null){?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Informacion de Paciente</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model->paciente,
                        'attributes'=>array(
                            'ocupacion_paciente',
                            'grupo_sanguineo_paciente',
                            'fecha_muerte',
                            'estado_paciente',
                            'id_contacto_paciente',
                        ),
                        'htmlOptions'=>array('class'=>'table table-condensed'),
                    ));

                ?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link("<i class='fa fa-edit'></i></i>Actualizar Informacion de Paciente",array('Persona/_form_updatepa','id'=>$model->id),array('class'=>'btn btn-social bg-blue'))?>
                <?php echo CHtml::link('Ver Historia',array('historialPaciente/view','id'=>$model->id),array('class'=>'btn bg-green'))?>
                <?php echo CHtml::link('Seguros de paciente',array('ConvenioInstitucion/SegurospacientesIndex','id'=>$model->id),array('class'=>'btn bg-red'))?>

            </div>
        </div>
        <?php }?>
        <?php if($model->empleado!=null){?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Informacion de Empleado</b></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model->empleado,
                        'attributes'=>array(
                            'fecha_contratacion',
                            'profesion',
                            'estado',
                        ),
                        'htmlOptions'=>array('class'=>'table table-condensed'),
                    ));

                    ?>
                </div>
                <div class="box-footer">
                    <?php echo CHtml::link("<i class='fa fa-edit'></i></i>Actualizar Informacion de Empleado",array('Persona/Updempleadoper','id'=>$model->id),array('class'=>'btn btn-social bg-blue'))?>
                </div>
            </div>
        <?php }?>
        <?php if($model->medico!=null){?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Informacion de Medico</b></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model->medico,
                        'attributes'=>array(
                            'matricula',
                            'colegiatura',
                            'estado',
                        ),
                        'htmlOptions'=>array('class'=>'table table-condensed'),
                    ));

                    ?>
                </div>
                <div class="box-footer">
                    <?php echo CHtml::link("<i class='fa fa-edit'></i></i>Actualizar Informacion de Medico",array('medico/UpdateMedicoEspe','id'=>$model->id),array('class'=>'btn btn-social bg-blue'))?>
                </div>
            </div>
        <?php }?>
    </div>
</div>