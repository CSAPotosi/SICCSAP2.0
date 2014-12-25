<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this HistorialPacienteController */
	/* @var $model HistorialPaciente */

	$this->breadcrumbs=array(
		'Historial Pacientes'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List HistorialPaciente', 'url'=>array('index')),
		array('label'=>'Manage HistorialPaciente', 'url'=>array('admin')),
	);
	?>

	<h1>Create HistorialPaciente</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>