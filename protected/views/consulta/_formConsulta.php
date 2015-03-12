<?php echo CHtml::beginForm(CHtml::normalizeUrl(array('consulta/prueba')),'post',array('id'=>'form-consulta'));?>
    <?php echo CHtml::activeHiddenField($consultaModel,'id_historia'); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo CHtml::activeLabel($consultaModel,'anamnesis');?>
                <?php echo CHtml::activeTextArea($consultaModel,'anamnesis',array('class'=>'form-control'));?>
                <?php echo CHtml::error($consultaModel,'anamnesis',array('class'=>'label label-danger'));?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo CHtml::activeLabel($consultaModel,'exploracion');?>
                <?php echo CHtml::activeTextArea($consultaModel,'exploracion',array('class'=>'form-control'));?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo CHtml::activeLabel($consultaModel,'diagnostico');?>
                <?php echo CHtml::activeTextArea($consultaModel,'diagnostico',array('class'=>'form-control'));?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo CHtml::activeLabel($consultaModel,'observaciones');?>
                <?php echo CHtml::activeTextArea($consultaModel,'observaciones',array('class'=>'form-control'));?>
            </div>
        </div>
    </div>

    <div class="margin">
        <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-primary'));?>
        <?php echo CHtml::button('Limpiar',array('class'=>'btn btn-primary','id'=>'prueba'));?>
    </div>
<?php echo CHtml::endForm(); ?>



<?php
Yii::app()->clientScript->registerScript('ajax','
    $("#form-consulta").on("submit",function(){
        loading();
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('consulta/createConsultaAjax')).'",
            type:"post",
            data:$("#form-consulta").serialize(),
            success:function(datos){
                $("#contenedor-consulta").html(datos);
                $(".especial").removeClass("hide");
            },
            complete:function(){
                $(".overlay").remove();
                $(".loading-img").remove();
            }
        });
        return false;
    });
    function loading(){
        $("#box-consulta").append($("<div class=\'overlay\'>"));
        $("#box-consulta").append($("<div class=\'loading-img\'>"))
    };

',CClientScript::POS_END);
?>

