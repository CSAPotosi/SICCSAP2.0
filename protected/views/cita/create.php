<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this CitaController */
	/* @var $model Cita */

	$this->breadcrumbs=array(
		'Citas'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Cita', 'url'=>array('index')),
		array('label'=>'Manage Cita', 'url'=>array('admin')),
	);
	?>

	<h1>Create Cita</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>