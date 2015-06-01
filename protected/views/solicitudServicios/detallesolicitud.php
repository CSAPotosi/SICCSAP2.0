<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'solicitud-servicios-detalle',
    'action'=>yii::app()->createUrl("SolicitudServicios/Detalleservicios"),
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
));?>

    <table class="table table-hover bordered" id="segcontenedor">
        <tr>
            <th>Servicio</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Estado</th>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-12">
            <label>TOTAL BRUTO</label>
            <div class="input-group">
                <input type="text" class="form-control" value="0" id="totalbruto" disabled>
                <span class="input-group-addon">Bs.</span>
            </div>
        </div>
        <div class="col-md-12">
            <label>DESCUENTO</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="DESCUENTO" id="descuento">
                <span class="input-group-addon">Bs.</span>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>