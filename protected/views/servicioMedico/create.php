<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this ServicioMedicoController */
	/* @var $model CategoriaServicio */

	$this->breadcrumbs=array(
		'Categoria Servicios'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List CategoriaServicio', 'url'=>array('index')),
		array('label'=>'Manage CategoriaServicio', 'url'=>array('admin')),
	);
	?>

	<h1>Create CategoriaServicio</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>