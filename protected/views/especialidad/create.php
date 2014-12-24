<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this EspecialidadController */
	/* @var $model Especialidad */

	$this->breadcrumbs=array(
		'Especialidads'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Especialidad', 'url'=>array('index')),
		array('label'=>'Manage Especialidad', 'url'=>array('admin')),
	);
	?>

	<center><h1>Crear Especialidad</h1></center>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>