<?php

$this->breadcrumbs=array(
    'Quirofanos'=>array('index'),
    $model->nombre_q=>array('view','id'=>$model->id_q),
    'Edicion',
);
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['quirofano/index']).' Edicion de '.$model->nombre_q;
?>


<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-primary box-solid">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>