<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'solicitud-servicios-detalle-con',
    'action'=>yii::app()->createUrl("SolicitudServicios/Detalleserviciosconsulta"),
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
));?>

    <table class="table table-hover bordered" id="segcontenedor2">
        <tr>
            <th>Servicio</th>
            <th>Institucion</th>
            <th>Cantidad</th>
            <th>Estado</th>
        </tr>
    </table>
    <div class="row hidden">
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
    <button class="btn btn-primary btn-lg" id="btnsolicitudconsulta">Registrar orden de Examen</button>
<?php $this->endWidget(); ?>