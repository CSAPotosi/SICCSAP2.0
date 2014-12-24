<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this CargoController */
	/* @var $model Cargo */

	$this->breadcrumbs=array(
		'Cargos'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Cargo', 'url'=>array('index')),
		array('label'=>'Manage Cargo', 'url'=>array('admin')),
	);
	?>

	<center><h1>Crear Cargo</h1></center>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>