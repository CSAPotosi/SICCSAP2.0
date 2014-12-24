<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this UnidadController */
	/* @var $model Unidad */

	$this->breadcrumbs=array(
		'Unidads'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Unidad', 'url'=>array('index')),
		array('label'=>'Manage Unidad', 'url'=>array('admin')),
	);
	?>

	<center><h1>Crear Unidad</h1></center>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>