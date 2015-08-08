<?php
/* @var $this AuthItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auth Items',
);

$this->menu=array(
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h2>Roles</h2>
            </div>
            <div class="box-body with-border">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">ROLES</a></li>
                        <li><a href="#tab_2" data-toggle="tab">TAREAS</a></li>
                        <li><a href="#tab_3" data-toggle="tab">ASIGNACIONES</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">

                            <?php $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'auth-item-grid',
                                'dataProvider'=>$roles,
                                'columns'=>array(
                                    'name',
                                    'description',
                                    array(
                                        'class'=>'CButtonColumn',
                                    ),
                                ),
                            )); ?>

                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">

                            <?php $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'auth-item-grid',
                                'dataProvider'=>$tareas,
                                'columns'=>array(
                                    'name',
                                    'description',
                                    array(
                                        'class'=>'CButtonColumn',
                                    ),
                                ),
                            )); ?>

                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">

                            <?php $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'auth-item-grid',
                                'dataProvider'=>$operaciones,
                                'columns'=>array(
                                    'name',
                                    'description',
                                    array(
                                        'class'=>'CButtonColumn',
                                    ),
                                ),
                            )); ?>

                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>













