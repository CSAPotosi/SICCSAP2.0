<?php echo CHtml::beginForm(CHtml::normalizeUrl(array('consulta/ingresarreceta')),'post'/*,array('id'=>'form-consulta')*/);?>
<?php /*echo CHtml::activeHiddenField($tratamientoModel,'id_historia'); */?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>

                <?php echo CHtml::activeLabel($tratamientoModel,'fecha_tratamiento');?>
                <?php echo CHtml::activeTextField($tratamientoModel,'fecha_tratamiento',array('class'=>'form-control','data-inputmask'=>"'alias': 'dd/mm/yyyy'",'data-mask'=>""));?>
                <?php echo CHtml::error($tratamientoModel,'fecha_tratamiento',array('class'=>'label label-danger'));?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo CHtml::activeLabel($tratamientoModel,'indicaciones');?>
            <?php echo CHtml::activeTextArea($tratamientoModel,'indicaciones',array('class'=>'form-control'));?>
            <?php echo CHtml::error($tratamientoModel,'indicaciones',array('class'=>'label label-danger'));?>
        </div>
    </div>
</div>
<div id="recetas">


</div>
<input type="button" id="add" value="Añadir Fila">
<div class="margin">
    <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-primary'));?>
    <?php echo CHtml::button('Limpiar',array('class'=>'btn btn-primary','id'=>'prueba'));?>
</div>
<?php echo CHtml::endForm(); ?>



<?php
Yii::app()->clientScript->registerScript('nombre','

    $("#add").click(function() {

     $("#plantillareceta").children().clone().appendTo("#recetas");
   });

    /*
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
    */

',CClientScript::POS_END);
?>

<div id="plantillareceta" style="visibility: hidden">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <?php echo CHtml::activeLabel($recetaModel,'[$i]Medicamento');?>
                <?php echo CHtml::activeTextField($recetaModel,'[$i]id_med',array('class'=>'form-control','placeholder'=>'Medicamento'));?>
                <?php echo CHtml::error($recetaModel,'[$i]id_med',array('class'=>'label label-danger'));?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <?php echo CHtml::activeLabel($recetaModel,'[$i]cantidad');?>
                <?php echo CHtml::activeTextField($recetaModel,'[$i]cantidad',array('class'=>'form-control'));?>
                <?php echo CHtml::error($recetaModel,'[$i]cantidad',array('class'=>'label label-danger'));?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo CHtml::activeLabel($recetaModel,'[$i]duracion');?>
                <?php echo CHtml::activeTextField($recetaModel,'[$i]duracion_tratamiento',array('class'=>'form-control'));?>
                <?php echo CHtml::error($recetaModel,'[$i]duracion_tratamiento',array('class'=>'label label-danger'));?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo CHtml::activeLabel($recetaModel,'[$i]indicaciones');?>
                <?php echo CHtml::activeTextField($recetaModel,'[$i]indicaciones',array('class'=>'form-control'));?>
                <?php echo CHtml::error($recetaModel,'[$i]indicaciones',array('class'=>'label label-danger'));?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo CHtml::activeLabel($recetaModel,'[$i]via');?>
                <?php echo CHtml::activeTextField($recetaModel,'[$i]via',array('class'=>'form-control'));?>
                <?php echo CHtml::error($recetaModel,'[$i]via',array('class'=>'label label-danger'));?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo CHtml::activeLabel($recetaModel,'[$i]comentarios');?>
                <?php echo CHtml::activeTextField($recetaModel,'[$i]info_adicional',array('class'=>'form-control'));?>
                <?php echo CHtml::error($recetaModel,'[$i]info_adicional',array('class'=>'label label-danger'));?>
            </div>
        </div>
    </div>
</div>