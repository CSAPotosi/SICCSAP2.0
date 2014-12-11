
<?php
/* @var $this PersonaController */
/* @var $model Persona */



$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->id,
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
            <li role="presentation"><a href="#medico" id="medico-tab" role="tab" data-toggle="tab" aria-controls="medico" aria-expanded="false">Datos de Medico</a></li>
        </ul>
        <div id="tabcontent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="persona" aria-labelledby="persona-tab">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'fotografia',
                        'id',
                        'dni',
                        'nit',
                        'nombres',
                        'primer_apellido',
                        'segundo_apellido',
                        'sexo',
                        'fecha_nacimiento',
                        'estado_civil',
                        'pais',
                        'provincia',
                        'localidad',
                        'telefono',
                        'celular',
                        'email',
                    ),
                    'htmlOptions'=>array('class'=>'table table-striped'),
                )); ?>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="medico" aria-labelledby="medico-tab">
                  hola mundo
            </div>
        </div>
    </div>
</div>