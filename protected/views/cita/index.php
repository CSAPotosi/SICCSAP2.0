<div class="col-md-12">

	<?php
	/* @var $this CitaController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Citas',
	);

	$this->menu=array(
		array('label'=>'Create Cita', 'url'=>array('create')),
		array('label'=>'Manage Cita', 'url'=>array('admin')),
	);
	?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Citas</h3>
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