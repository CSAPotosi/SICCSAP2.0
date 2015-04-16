
<?php
/* @var $this PersonaController */
/* @var $model Persona */



$this->breadcrumbs=array(
    'Personas'=>array('index'),
    $model->id,
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
        <ul id="tabsPersona" class="nav nav-tabs" role="tab-panel">
            <li class="pull-right header">
                <div class="btn-group">
                    <?php echo CHtml::link("<i class='fa fa-edit'></i>",Yii::app()->createUrl('Persona/update',array('id'=>$model->id)),array('class'=>'btn btn-primary')); ?>
                </div>
            </li>
            <li role="presentation" class="active"><a href="#persona" id="persona-tab" role="tab" data-toggle="tab" aria-controls="persona" aria-expanded="false">Datos Personales</a></li>
            <li role="presentation"><a href="#paciente" id="paciente-tab" role="tab" data-toggle="tab" aria-controls="paciente" aria-expanded="false">Datos de historial Meidico</a></li>
        </ul>
        <div id="tabcontent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="persona" aria-labelledby="persona-tab">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'id',
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
                        'fotografia',
                    ),
                    'htmlOptions'=>array('class'=>'table table-striped'),
                )); ?>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="paciente" aria-labelledby="paciente-tab">
                hola mundo
            </div>
        </div>
    </div>
</div>