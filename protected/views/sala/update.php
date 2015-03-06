<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this SalaController */
		/* @var $model TipoSala */

		$this->breadcrumbs=array(
			'Tipo Salas'=>array('index'),
			$model->id_tipo_sala=>array('view','id'=>$model->id_tipo_sala),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List TipoSala', 'url'=>array('index')),
			array('label'=>'Create TipoSala', 'url'=>array('create')),
			array('label'=>'View TipoSala', 'url'=>array('view', 'id'=>$model->id_tipo_sala)),
			array('label'=>'Manage TipoSala', 'url'=>array('admin')),
		);
		?>

		<h1>Update TipoSala <?php echo $model->id_tipo_sala; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>