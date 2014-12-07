<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this EspecialidadController */
		/* @var $model Especialidad */

		$this->breadcrumbs=array(
			'Especialidads'=>array('index'),
			$model->id_especialidad=>array('view','id'=>$model->id_especialidad),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List Especialidad', 'url'=>array('index')),
			array('label'=>'Create Especialidad', 'url'=>array('create')),
			array('label'=>'View Especialidad', 'url'=>array('view', 'id'=>$model->id_especialidad)),
			array('label'=>'Manage Especialidad', 'url'=>array('admin')),
		);
		?>

		<h1>Update Especialidad <?php echo $model->id_especialidad; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>