<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="box box-primary box-solid">
            <div class="box-header">
                Atenciones Medicas
            </div>
            <div class="box-body">
                <div class="input-group margin">
                    <input class="form-control" type="text" id="buscarAtencionesMedicas" placeholder="Buscar atencion medica,medico o especialidad">
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                        </span>
                </div>
                <div id="Layer1" style="height:550px; overflow: scroll;">
                    <div id="contenedorRowAtencionMedica">
                        <?php $this->renderPartial('form_row_atencionmedica',array('atencion'=>$atencion))?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in modal-primary" id="atencionmedica" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Actualizar Item de Laboratorio</h4>
            </div>
            <div class="modal-body" id="contenedoratencionesmedicas">

            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpditemlab','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('atencionesmedicasdisponibles','
    $("#buscarAtencionesMedicas").on("keyup",function(){
            var texto=$(this).val();
            if(texto.length>0){
                $(".val").addClass("hide");
                $(".val[data-nombre*=\'"+texto+"\']").removeClass("hide");
                $(".val[data-especialidad*=\'"+texto+"\']").removeClass("hide");
                $(".val[data-tipo*=\'"+texto+"\']").removeClass("hide");
            }
            else{
                $(".val").removeClass("hide");
            }
    })
    eventosclick();
    function eventosclick(){
        $(".btnAtenMedi").on("click",function(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenedoratencionesmedicas").html(datos);
                }
            });
            $("#atencionmedica").modal("show");
            return false;
        });
    }
');