<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this ServicioController */
		/* @var $model Servicio */

		$this->breadcrumbs=array(
			'Servicios'=>array('index'),
			$model->id_servicio=>array('view','id'=>$model->id_servicio),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List Servicio', 'url'=>array('index')),
			array('label'=>'Create Servicio', 'url'=>array('create')),
			array('label'=>'View Servicio', 'url'=>array('view', 'id'=>$model->id_servicio)),
			array('label'=>'Manage Servicio', 'url'=>array('admin')),
		);
		?>

		<h1>Update Servicio <?php echo $model->id_servicio; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>