<div class="row">
    <div class="col-md-12">
        <div class="callout callout-info">
            <h4>Fecha y hora de la consulta</h4>
            <div class="dl-horizontal">
                <dt>Fecha:</dt><dd><?php setlocale(LC_TIME, ''); echo strtoupper(strftime('%A, %d de %B del %Y.',strtotime($detalleConsulta->fecha_diagnostico)));?></dd>
                <dt>Hora:</dt><dd><?php echo date('h:i A.',strtotime($detalleConsulta->fecha_diagnostico));?></dd>
            </div>
        </div>
    </div>
</div>
<?php echo CHtml::activeHiddenField($detalleConsulta,'id_consulta');?>
<div class="row">
    <div class="col-md-6">
        <p>
            <div class="dl-horizontal">
                <dt>ANAMNESIS:</dt>
                <dd><?php echo $detalleConsulta->anamnesis ;?></dd>
            </div>
        </p>
    </div>
    <div class="col-md-6">
        <p>
            <div class="dl-horizontal">
                <dt>EXPLORACION:</dt>
                <dd><?php echo $detalleConsulta->exploracion ;?></dd>
            </div>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <p>
            <div class="dl-horizontal">
                <dt>DIAGNOSTICO:</dt>
                <dd><?php echo $detalleConsulta->diagnostico ;?></dd>
            </div>
        </p>
    </div>
    <div class="col-md-6">
        <p>
            <div class="dl-horizontal">
                <dt>OBSERVACIONES</dt>
                <dd><?php echo $detalleConsulta->observaciones ;?></dd>
            </div>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <p>
            <div class="dl-horizontal">
                <dt>CLASIFICACION</dt>
                <dd>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ASs</th>
                        </tr>
                        <tr>
                            <td>nueviasd </td>
                        </tr>
                    </table>
                </dd>
            </div>
        </p>
    </div>
</div>