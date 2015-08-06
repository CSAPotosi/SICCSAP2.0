<?php
$this->breadcrumbs=array(
    'Quirofanos',
);

$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['/']).' Quirofanos';
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">Lista de quirofanos</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>COSTO (En Bs.)</th>
                        <th>ESTADO</th>
                        <th>OPCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listaQuirofanos as $itemQ):?>
                        <tr>
                            <td><?php echo $itemQ->nombre_q;?></td>
                            <td><?php echo $itemQ->descripcion;?></td>
                            <td><?php echo $itemQ->costo;?></td>
                            <td><input type="checkbox" class="btnChangeState" <?php echo ($itemQ->estado_q)?'checked':''; ?> data-toggle="toggle" data-size="mini" data-on="ACTIVO" data-onstyle="primary" data-offstyle="danger" data-off="INACTIVO" data-url="<?php echo CHtml::normalizeUrl(['quirofano/changeState','id'=>$itemQ->id_q]);?>"></td>
                            <td>
                                <?php echo CHtml::link('<i class="fa fa-list"></i>',['quirofano/view','id'=>$itemQ->id_q],['class'=>'btn btn-primary btn-sm','title'=>'Ver detalle']);?>
                                <?php echo CHtml::link('<i class="fa fa-edit"></i>',['quirofano/update','id'=>$itemQ->id_q],['class'=>'btn btn-primary btn-sm','title'=>'Editar quirofano']);?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Nuevo',['quirofano/create'],['class'=>'btn btn-primary']);?>
            </div>
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
