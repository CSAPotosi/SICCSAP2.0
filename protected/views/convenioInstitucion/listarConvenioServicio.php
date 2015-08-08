<?php if($listaconvenioservicio!=null){?>
<div class="input-group">
    <div class="col-md-6">
        <span class="label label-success pull-left"><?php echo $convenio->nombre_convenio?></span>
    </div>
    <div class="col-md-6">
        <div class="input-group margin pull-right">
            <input class="form-control" type="text" id="buscarservicioconvenio" placeholder="Burcar Instituciones">
            <span class="input-group-btn">
                <button class="btn btn-float btn-primary" type="button"><i class="fa fa-fw fa-search"></i></button>
            </span>
        </div>
    </div>
</div>
<div id="Layer1" style="height:200px; overflow: scroll;">
    <table class="table table-hover bordered">
        <tr>
            <th>Servicio</th>
            <th>Monto</th>
            <th>Institucion</th>
            <th>Descuento</th>
            <th>convenio</th>
            <th>Fecha Creacion</th>
            <th>Fecha Actualizacion</th>
            <th>Descripcion</th>
            <th>Estado</th>
        </tr>
        <?php foreach($listaconvenioservicio as $list):?>
            <?php $servicio=Servicio::model()->findByPk($list->id_servicio) ?>
            <tr >
                <td><?php echo $servicio->nombre_serv?></td>
                <td><?php echo $servicio->precioServicio->monto?></td>
                <td><?php echo $servicio->idInsti->nombre?></td>
                <td><?php echo $list->descuento_servicio?></td>
                <td><?php echo $list->id_convenio_institucion?></td>
                <td><?php echo $list->fecha_creacion?></td>
                <td><?php echo $list->fecha_actualizacion?></td>
                <td><?php echo $list->descripcion?></td>
                <td><input type="checkbox" class="btnChangeState" <?php echo ($list->estado)?'checked':''; ?> data-toggle="toggle" data-size="mini" data-on="ACTIVO" data-onstyle="primary" data-offstyle="danger" data-off="INACTIVO" data-url="<?php echo CHtml::normalizeUrl(['ConvenioInstitucion/changeStateConvenio','id'=>$list->id_con_ser]);?>"></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
<?php }else{?>
    <div class="row">
        <div class="col-md-12">
            <span class="label label-danger pull-left"><?php echo $convenio->nombre_convenio?></span>
        </div>
    </div>
    <br>
    <div class="callout callout-danger">
        <h4>No existe Servicios En este Convenio Institucional</h4>
    </div>
<?php }?>
<input type="hidden" value="<?php echo $convenio->id_convenio?>" id="id_convenio_servicio">
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-target="#servicioconvevenio" data-toggle="modal">
            <b>Agregar Servicios</b>
        </button>
    </div>
</div>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
?>
<?php Yii::app()->clientScript->registerScript('convenio_institucion','

');