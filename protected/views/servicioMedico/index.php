<div class="col-md-12">

	<?php
	/* @var $this ServicioMedicoController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Categoria Servicios',
	);

	$this->menu=array(
		array('label'=>'Create CategoriaServicio', 'url'=>array('create')),
		array('label'=>'Manage CategoriaServicio', 'url'=>array('admin')),
	);
	?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Categoria Servicios</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
		</div>
		<div class="box-body">
			<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			)); ?>
		</div>
	</div>
</div>