<?php echo CHtml::beginForm(CHtml::normalizeUrl(array('consulta/prueba','hid'=>$ConsultaModel->id_historia)),'post');?>
<div class="callout callout-info">
    <h4>Fecha y hora del diagnostico</h4>
    <div class="dl-horizontal">
        <dt>Fecha:</dt><dd><?php setlocale(LC_TIME, ''); echo strtoupper(strftime('%A, %d de %B del %Y.'));?></dd>
        <dt>Hora:</dt><dd><?php echo date('h:i A.');?></dd>
    </div>
</div>

<?php echo CHtml::errorSummary($ConsultaModel,'<i class="fa fa-warning"></i><h5><b>Error,</b> debe corregir los siguientes problemas para guardar:</h5>',null,array('class'=>'alert alert-danger'));?>

<?php $this->renderPartial('_form_sv',array('SVModelList'=>$SVModelList)); ?>
<h5 class="page-header">
    Diagnostico Medico
</h5>

<div class="form-group">
    <?php echo CHtml::activeLabel($ConsultaModel,'anamnesis');?>
    <?php echo CHtml::activeTextArea($ConsultaModel,'anamnesis',array('class'=>'form-control'));?>
    <?php echo CHtml::error($ConsultaModel,'anamnesis');?>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo CHtml::activeLabel($ConsultaModel,'exploracion');?>
            <?php echo CHtml::activeTextArea($ConsultaModel,'exploracion',array('class'=>'form-control'));?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo CHtml::activeLabel($ConsultaModel,'diagnostico');?>
            <?php echo CHtml::activeTextArea($ConsultaModel,'diagnostico',array('class'=>'form-control'));?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo CHtml::activeLabel($ConsultaModel,'tratamiento');?>
            <?php echo CHtml::activeTextArea($ConsultaModel,'tratamiento',array('class'=>'form-control'));?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo CHtml::activeLabel($ConsultaModel,'observaciones');?>
            <?php echo CHtml::activeTextArea($ConsultaModel,'observaciones',array('class'=>'form-control'));?>
        </div>
    </div>
</div>

<div class="margin">
    <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-primary'));?>
    <?php echo CHtml::button('Limpiar',array('class'=>'btn btn-primary'));?>
</div>

<?php echo CHtml::endForm(); ?>


