<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this SolicitudServiciosController */
		/* @var $model SolicitudServicios */

		$this->breadcrumbs=array(
			'Solicitud Servicioses'=>array('index'),
			$model->id_solicitud=>array('view','id'=>$model->id_solicitud),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List SolicitudServicios', 'url'=>array('index')),
			array('label'=>'Create SolicitudServicios', 'url'=>array('create')),
			array('label'=>'View SolicitudServicios', 'url'=>array('view', 'id'=>$model->id_solicitud)),
			array('label'=>'Manage SolicitudServicios', 'url'=>array('admin')),
		);
		?>

		<h1>Update SolicitudServicios <?php echo $model->id_solicitud; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>