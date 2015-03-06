<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this ServicioMedicoController */
		/* @var $model CategoriaServicio */

		$this->breadcrumbs=array(
			'Categoria Servicios'=>array('index'),
			$model->id_categoria_serv=>array('view','id'=>$model->id_categoria_serv),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List CategoriaServicio', 'url'=>array('index')),
			array('label'=>'Create CategoriaServicio', 'url'=>array('create')),
			array('label'=>'View CategoriaServicio', 'url'=>array('view', 'id'=>$model->id_categoria_serv)),
			array('label'=>'Manage CategoriaServicio', 'url'=>array('admin')),
		);
		?>

		<h1>Update CategoriaServicio <?php echo $model->id_categoria_serv; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>