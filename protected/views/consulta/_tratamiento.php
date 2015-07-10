
<div class="row">
    <div class="col-md-6">
        <div class="box box-solid box-primary" id="box-tratamiento">
            <div class="box-header">
                <h3 class="box-title">Tratamientos realizados</h3>
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_tableTratamiento',['listaTratamiento'=>$modelConsulta->tratamientos]);?>
            </div>
            <div class="box-footer">
                <?php echo CHtml::button('Nuevo',['class'=>'btn btn-primary','id'=>'btnModalCreateTratamiento','data-toggle'=>'modal','data-target'=>'#modalFormTratamiento'])?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-solid box-primary" id="box-detalle-trat">
            <div class="box-header">
                <h3 class="box-title">Detalle de tratamiento</h3>
            </div>
            <div class="box-body">
                <?php $this->renderPartial('_detalleTratamiento',['modelTratamiento'=>null]);?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFormTratamiento" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" id="btnCreateTratamiento" class="btn btn-primary  pull-left">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
    Yii::app()->clientScript->registerScript('modalTratamiento','
        $("#btnModalCreateTratamiento").on("click",function(){
            $("#modalFormTratamiento .modal-title").text("Nuevo Tratamiento");
            $.ajax({
                url:"'.CHtml::normalizeUrl(['consulta/loadFormTratamientoAjax','id_con'=>$modelConsulta->id_consulta]).'",
                method:"post",
                success:function(datos){
                    $("#modalFormTratamiento .modal-body").html(datos);
                }
            });
        });

        $("#btnCreateTratamiento").on("click",function(){
            $.ajax({
                beforeSend:function(){ $("#box-tratamiento").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>");},
                url:$("#form-tratamiento").attr("action"),
                data:$("#form-tratamiento").serialize(),
                method:"post",
                success:function(datos){
                    var temp=$(datos);
                    if(temp.find("#form-tratamiento").length>0){
                        $("#modalFormTratamiento .modal-body").html(datos);
                        $("#modalFormTratamiento .overlay").remove();
                    }
                    else{
                        $("#modalFormTratamiento").modal("hide");
                        $("#box-tratamiento .box-body").html(datos);
                        $("#table-tratamiento tbody tr").on("click",clickTableTratamiento);
                    }
                },
                complete:function(){$("#box-tratamiento .overlay").remove();}
            });
        });

        $("#table-tratamiento tbody tr").on("click",clickTableTratamiento);

        function clickTableTratamiento(){
            $("#table-tratamiento tr").removeClass("bg-blue");
            $(this).addClass("bg-blue");
            var fila=$(this);
            $.ajax({
                beforeSend:function(){
                    $("#box-detalle-trat").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>");
                },
                url:"'.CHtml::normalizeUrl(['consulta/loadDetalleTratamientoAjax']).'",
                data:{id_trat:fila.attr("data-index")},
                success:function(datos){
                    $("#box-detalle-trat .box-body").html(datos);
                },
                complete:function(){
                    $("#box-detalle-trat .overlay").remove();
                }
            });
        }

    ');
?>