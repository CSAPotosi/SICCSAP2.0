<?php
$this->breadcrumbs=array(
	'Quirofanos'=>array('index'),
	$model->nombre_q,
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['quirofano/index']).' Detalle de quirofano';
?>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header">
            <h3 class="box-title">Quirofano: <?php echo $model->nombre_q; ?></h3>
        </div>
		<div class="box-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
                    'nombre_q',
                    'descripcion',
                    'costo',
                    array(
                        'label'=>'ESTADO',
                        'type'=>'raw',
                        'value'=>CHtml::checkBox('estado',($model->estado_q)?true:false,['class'=>'btnChangeState','data-toggle'=>'toggle',"data-size"=>"mini" ,"data-on"=>"ACTIVO" ,"data-onstyle"=>"primary" ,"data-offstyle"=>"danger" ,"data-off"=>"INACTIVO","data-url" =>CHtml::normalizeUrl(['quirofano/changeState','id'=>$model->id_q])])
                    )
                ),
            )); ?>
        </div>
    </div>
</div>


<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScript('javascript','
    $(".btnChangeState").on("change",function(){
        $.ajax({
            url:$(this).attr("data-url"),
            type:"get"
        });
    });
');
?>