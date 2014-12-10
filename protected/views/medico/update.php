<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this MedicoController */
		/* @var $model Medico */

		$this->breadcrumbs=array(
			'Medicos'=>array('index'),
			$model->id=>array('view','id'=>$model->id),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List Medico', 'url'=>array('index')),
			array('label'=>'Create Medico', 'url'=>array('create')),
			array('label'=>'View Medico', 'url'=>array('view', 'id'=>$model->id)),
			array('label'=>'Manage Medico', 'url'=>array('admin')),
		);
		?>

		<h1>Update Medico <?php echo $model->id; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>