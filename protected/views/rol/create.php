<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header"><h2>Creacion de Roles</h2></div>
            <div class="box-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                <?php //$this->renderPartial('_view', array('roles'=>$roles,'tareas'=>$tareas,'operaciones'=>$operaciones)); ?>
            </div>
        </div>
    </div>
</div>

<?php
Yii::app()->clientScript->registerScript('search', '

');
?>