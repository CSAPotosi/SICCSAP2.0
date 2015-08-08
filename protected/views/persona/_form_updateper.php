<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/view','id'=>$model->id])."Detalle";
$this->breadcrumbs=array(
    'Detalle de Perosona'=>array('view','id'=>$model->id),
    'Actualizacion de datos Perosonales',
);
?>
<div class="row">
<div class="col-md-offset-2 col-md-8">
    <div class="box box-primary">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Actualizar Datos Personales
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>
            </div>
        </div>
    </div>
</div>
</div>