<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this TipoAntecedenteController */
		/* @var $model TipoAntecedente */

		$this->breadcrumbs=array(
			'Tipo Antecedentes'=>array('index'),
			$model->id_tipo_ant=>array('view','id'=>$model->id_tipo_ant),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List TipoAntecedente', 'url'=>array('index')),
			array('label'=>'Create TipoAntecedente', 'url'=>array('create')),
			array('label'=>'View TipoAntecedente', 'url'=>array('view', 'id'=>$model->id_tipo_ant)),
			array('label'=>'Manage TipoAntecedente', 'url'=>array('admin')),
		);
		?>

		<h1>Update TipoAntecedente <?php echo $model->id_tipo_ant; ?></h1>

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>	</div>
</div>