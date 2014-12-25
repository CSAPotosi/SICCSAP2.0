<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this HistorialPacienteController */
		/* @var $model HistorialPaciente */

		$this->breadcrumbs=array(
			'Historial Pacientes'=>array('index'),
			$model->id=>array('view','id'=>$model->id),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List HistorialPaciente', 'url'=>array('index')),
			array('label'=>'Create HistorialPaciente', 'url'=>array('create')),
			array('label'=>'View HistorialPaciente', 'url'=>array('view', 'id'=>$model->id)),
			array('label'=>'Manage HistorialPaciente', 'url'=>array('admin')),
		);
		?>

		<h1>Update HistorialPaciente <?php echo $model->id; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>