<?php echo CHtml::activeHiddenField($detalleConsulta,'id_consulta');?>
<div class="row">
    <div class="col-md-12">
        <div class="dl-horizontal">
            <dt>FECHA:</dt><dd><?php setlocale(LC_TIME, ''); echo strtoupper(strftime('%A, %d de %B del %Y.',strtotime($detalleConsulta->fecha_diagnostico)));?></dd>
            <dt>HORA:</dt><dd><?php echo date('h:i A.',strtotime($detalleConsulta->fecha_diagnostico));?></dd>
        </div>
    </div>
</div>
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
                            <th>CODIGO</th><th>TITULO</th>
                        </tr>
                        <?php foreach($listaCie as $item):?>
                        <tr>
                            <td><?php echo $item;?></td><td><?php echo ItemCie10::model()->findByPk($item)->titulo; ?></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </dd>
            </div>
        </p>
    </div>
</div>

<?php echo CHtml::link('<i class="fa fa-print"></i> PDF',['reportes/consulta','id_consulta'=>$detalleConsulta->id_consulta],['class'=>'btn btn-primary','target'=>'_blanck']);?>