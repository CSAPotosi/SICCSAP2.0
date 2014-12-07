
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
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Persona #<?php echo $model->id; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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
		'fotografia',
	),
)); ?>
</div>
</div>