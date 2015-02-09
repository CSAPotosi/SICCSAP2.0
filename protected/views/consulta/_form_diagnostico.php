<div class="callout callout-info">
    <h4>Fecha y hora del diagnostico</h4>
    <div class="dl-horizontal">
        <dt>Fecha:</dt><dd><?php setlocale(LC_TIME, ''); echo strtoupper(strftime('%A, %d de %B del %Y.'));?></dd>
        <dt>Hora:</dt><dd><?php echo date('h:i A.');?></dd>
    </div>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($ConsultaModel,'anamnesis');?>
    <?php echo CHtml::activeTextArea($ConsultaModel,'anamnesis',array('class'=>'form-control'));?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($ConsultaModel,'exploracion');?>
    <?php echo CHtml::activeTextArea($ConsultaModel,'exploracion',array('class'=>'form-control'));?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($ConsultaModel,'diagnostico');?>
    <?php echo CHtml::activeTextArea($ConsultaModel,'diagnostico',array('class'=>'form-control'));?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($ConsultaModel,'tratamiento');?>
    <?php echo CHtml::activeTextArea($ConsultaModel,'tratamiento',array('class'=>'form-control'));?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($ConsultaModel,'observaciones');?>
    <?php echo CHtml::activeTextArea($ConsultaModel,'observaciones',array('class'=>'form-control'));?>
</div>

<div class="margin">
    <?php echo CHtml::button('Guardar',array('class'=>'btn btn-primary'));?>
    <?php echo CHtml::button('Limpiar',array('class'=>'btn btn-primary'));?>
</div>

