
<?php
/* @var $this TipoAntecedenteController */
/* @var $model TipoAntecedente */



$this->breadcrumbs=array(
	'Tipo Antecedentes'=>array('index'),
	$model->id_tipo_ant,
);

$this->menu=array(
	array('label'=>'List TipoAntecedente', 'url'=>array('index')),
	array('label'=>'Create TipoAntecedente', 'url'=>array('create')),
	array('label'=>'Update TipoAntecedente', 'url'=>array('update', 'id'=>$model->id_tipo_ant)),
	array('label'=>'Delete TipoAntecedente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_ant),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoAntecedente', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View TipoAntecedente #<?php echo $model->id_tipo_ant; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_ant',
		'titulo',
		'genero_aplicado',
		'descripcion',
	),
)); ?>
</div>
</div>