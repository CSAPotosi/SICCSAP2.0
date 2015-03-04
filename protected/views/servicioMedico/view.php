
<?php
/* @var $this ServicioMedicoController */
/* @var $model CategoriaServicio */



$this->breadcrumbs=array(
	'Categoria Servicios'=>array('index'),
	$model->id_categoria_serv,
);

$this->menu=array(
	array('label'=>'List CategoriaServicio', 'url'=>array('index')),
	array('label'=>'Create CategoriaServicio', 'url'=>array('create')),
	array('label'=>'Update CategoriaServicio', 'url'=>array('update', 'id'=>$model->id_categoria_serv)),
	array('label'=>'Delete CategoriaServicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_serv),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriaServicio', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				<b><?php echo $model->nombre_categoria; ?></b>            </h3>
        </div>
		<div class="box-body">

        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id_categoria_serv',
                'descripcion_categoria_serv',
            ),
        )); ?>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Servicios en esta categoria</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$servicios,
                    'itemView'=>'_itemServicioMedico',
                )); ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <?php echo CHtml::link('Agregar Servicio',array('servicioMedico/createServicio','csid'=>$model->id_categoria_serv),array('class'=>'btn btn-primary'))?>
        </div>
    </div>
</div>