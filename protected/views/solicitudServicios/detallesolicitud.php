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

<?php $this->endWidget(); ?>