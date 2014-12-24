<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this TurnoController */
	/* @var $model Turno */

	$this->breadcrumbs=array(
		'Turnos'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Turno', 'url'=>array('index')),
		array('label'=>'Manage Turno', 'url'=>array('admin')),
	);
	?>

	<center><h1>Crear Turno</h1></center>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>