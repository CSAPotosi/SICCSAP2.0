<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this RegistroController */
	/* @var $model Registro */

	$this->breadcrumbs=array(
		'Registros'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Registro', 'url'=>array('index')),
		array('label'=>'Manage Registro', 'url'=>array('admin')),
	);
	?>

	    <center><h1>Registrar una Asistencia</h1></center>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>

