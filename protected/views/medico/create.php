<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this MedicoController */
	/* @var $model Medico */

	$this->breadcrumbs=array(
		'Medicos'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Medico', 'url'=>array('index')),
		array('label'=>'Manage Medico', 'url'=>array('admin')),
	);
	?>

	<center><h1>Crear Medico</h1></center>

	<?php $this->renderPartial('_form', array('modelM'=>$modelM)); ?>


    </div>
</div>