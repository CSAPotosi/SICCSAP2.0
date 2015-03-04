
<?php
/* @var $this SalaController */
/* @var $model TipoSala */



$this->breadcrumbs=array(
	'Tipo Salas'=>array('index'),
	$model->nombre_tipo_sala,
);

$this->menu=array(
	array('label'=>'List TipoSala', 'url'=>array('index')),
	array('label'=>'Create TipoSala', 'url'=>array('create')),
	array('label'=>'Update TipoSala', 'url'=>array('update', 'id'=>$model->id_tipo_sala)),
	array('label'=>'Delete TipoSala', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_sala),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoSala', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				<b>TIPO DE SALA: </b><?php echo $model->nombre_tipo_sala; ?>            </h3>
        </div>
		<div class="box-body">

            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
                    'id_tipo_sala',
                    'descripcion_tipo_sala',
                    array(
                        'label'=>'Costo',
                        'value'=>$costo->monto,
                    ),
                ),
            )); ?>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de salas</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>Numero</th>
                    <th>Ubicacion</th>
                    <th>Estado</th>
                </tr>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$salas,
                    'itemView'=>'_itemSala',
                )); ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <a href="<?php echo Yii::app()->createUrl("sala/createSala",array('tsid'=>$model->id_tipo_sala)); ?>" class="btn btn-primary">Nueva Sala</a>
        </div>
    </div>
</div>