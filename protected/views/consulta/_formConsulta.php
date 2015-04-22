
<?php echo CHtml::beginForm(CHtml::normalizeUrl(array('consulta/prueba')),'post',array('id'=>'form-consulta'));?>
    <?php echo CHtml::activeHiddenField($consultaModel,'id_historia'); ?>

    <?php $this->renderPartial('_formSV',array('listaSV'=>$listaSV));?>
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

    <div class="row">

        <div class="col-md-10 table-responsive">
            <label for="">Clasificacion CIE10</label>
            <table class="table table-hover table-bordered" name="tabla">
                <thead>
                <tr><th style="width: 15%">Codigo</th><th>Titulo</th><th style="width: 10%"></th></tr>
                </thead>
                <tbody id="clasificacion_cie10">

                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <label for="">A&ntilde;adir Nuevo</label>
            <?php echo CHtml::link('<i class="fa fa-plus"></i>','',array("class"=>"btn btn-block btn-primary pull-right",'data-toggle'=>'modal','data-target'=>'#winCie10'));?>
        </div>
    </div>
    <div class="margin">
        <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-primary'));?>
        <?php echo CHtml::button('Limpiar',array('class'=>'btn btn-primary','id'=>'prueba'));?>
    </div>
<?php echo CHtml::endForm(); ?>

<div class="modal fade" id="winCie10" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Elija un item para agregarlo</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('/cie10/index'); ?>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnAddCie','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Agregar',true)?>
                <?php echo CHtml::tag('button',array('class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>

<?php
Yii::app()->clientScript->registerScript('ajax','
    $("#form-consulta").on("submit",ajaxConsulta);

    function ajaxConsulta(){
        loading();
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('consulta/createConsultaAjax')).'",
            type:"post",
            data:$("#form-consulta").serialize(),
            success:function(datos){
                $("#contenedor-consulta").html(datos);
                if($("#Consulta_id_consulta").val() != null)
                    $(".especial").removeClass("hide");
            },
            complete:function(){
                $(".overlay").remove();
                $(".loading-img").remove();
                $("#form-consulta").on("submit",ajaxConsulta);
            }
        });
        return false;
    }

    function loading(){
        $("#box-consulta").append($("<div class=\'overlay\'>"));
        $("#box-consulta").append($("<div class=\'loading-img\'>"))
    };

    $("#btnAddCie").click(function(){
        $("#Items>tr.bg-blue").each(function(item){
            var codigo=$(this).attr("value");
            if($(".ItemCIE[value=\'"+codigo+"\']").length == 0){
                var fila=$("<tr><td>"+codigo+"</td><td>"+$(this).children("td").eq(1).text()+"</td><td><a href=\'#\' class=\'btn btn-primary eraseRow\'><i class=\'fa fa-times\'></i> Quitar</a></td></tr>");
                var campo=$("<input type=\'hidden\' name=\'CIE10[]\' value=\'"+codigo+"\' class=\'ItemCIE\'>");
                fila.children("td").eq(0).append(campo);
                $("#clasificacion_cie10").append(fila);
                $("#Items>tr").removeClass("bg-blue");
            }
        });
        $("#winCie10").modal("toggle");

        $("td>a.eraseRow").on("click",function(){
            $(this).parent().parent().remove();
            return false;
        })
    });
',CClientScript::POS_END);
?>
