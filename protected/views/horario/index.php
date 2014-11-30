<div class="col-md-12">
<?php

$this->breadcrumbs=array(
	'Horarios',
);

$this->menu=array(
	array('label'=>'Create Horario', 'url'=>array('create')),
	array('label'=>'Manage Horario', 'url'=>array('admin')),
);
?>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Horarios Activos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProviderActive,
                'itemView'=>'_view',
            )); ?>
        </div>
    </div>
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Horarios Inactivos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProviderInactive,
                'itemView'=>'_view',
            )); ?>
        </div>
    </div>
</div>
