<?php
/* @var $this QuirofanoController */
/* @var $model Quirofano */

$this->breadcrumbs=array(
    'Quirofanos'=>array('index'),
    'Nuevo',
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['quirofano/index']).' Nuevo quirofano';
?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary box-solid">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>
