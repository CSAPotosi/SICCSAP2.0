<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this RegistroController */
		/* @var $model Registro */

		$this->breadcrumbs=array(
			'Registros'=>array('index'),
			$model->id_registro=>array('view','id'=>$model->id_registro),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List Registro', 'url'=>array('index')),
			array('label'=>'Create Registro', 'url'=>array('create')),
			array('label'=>'View Registro', 'url'=>array('view', 'id'=>$model->id_registro)),
			array('label'=>'Manage Registro', 'url'=>array('admin')),
		);
		?>

		<h1>Update Registro <?php echo $model->id_registro; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>