<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this DiagnosticoController */
		/* @var $model Diagnostico */

		$this->breadcrumbs=array(
			'Diagnosticos'=>array('index'),
			$model->id_diagnostico=>array('view','id'=>$model->id_diagnostico),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List Diagnostico', 'url'=>array('index')),
			array('label'=>'Create Diagnostico', 'url'=>array('create')),
			array('label'=>'View Diagnostico', 'url'=>array('view', 'id'=>$model->id_diagnostico)),
			array('label'=>'Manage Diagnostico', 'url'=>array('admin')),
		);
		?>

		<h1>Update Diagnostico <?php echo $model->id_diagnostico; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>