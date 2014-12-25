<div class="col-md-12">

	<?php
	/* @var $this HistorialPacienteController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Historial Pacientes',
	);

	$this->menu=array(
		array('label'=>'Create HistorialPaciente', 'url'=>array('create')),
		array('label'=>'Manage HistorialPaciente', 'url'=>array('admin')),
	);
	?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Historial Pacientes</h3>
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