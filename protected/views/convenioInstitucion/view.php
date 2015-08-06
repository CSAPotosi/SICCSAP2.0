
<?php
/* @var $this ConvenioInstitucionController */
/* @var $model ConvenioInstitucion */



$this->breadcrumbs=array(
	'Convenio Institucions'=>array('index'),
	$model->id_convenio,
);

$this->menu=array(
	array('label'=>'List ConvenioInstitucion', 'url'=>array('index')),
	array('label'=>'Create ConvenioInstitucion', 'url'=>array('create')),
	array('label'=>'Update ConvenioInstitucion', 'url'=>array('update', 'id'=>$model->id_convenio)),
	array('label'=>'Delete ConvenioInstitucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_convenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConvenioInstitucion', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View ConvenioInstitucion #<?php echo $model->id_convenio; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_convenio',
		'nombre_convenio',
		'id_insti',
	),
)); ?>
</div>
</div>