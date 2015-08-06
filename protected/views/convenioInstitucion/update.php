<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this ConvenioInstitucionController */
		/* @var $model ConvenioInstitucion */

		$this->breadcrumbs=array(
			'Convenio Institucions'=>array('index'),
			$model->id_convenio=>array('view','id'=>$model->id_convenio),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List ConvenioInstitucion', 'url'=>array('index')),
			array('label'=>'Create ConvenioInstitucion', 'url'=>array('create')),
			array('label'=>'View ConvenioInstitucion', 'url'=>array('view', 'id'=>$model->id_convenio)),
			array('label'=>'Manage ConvenioInstitucion', 'url'=>array('admin')),
		);
		?>

		<h1>Update ConvenioInstitucion <?php echo $model->id_convenio; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>