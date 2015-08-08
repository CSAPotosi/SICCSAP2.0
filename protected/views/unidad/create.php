<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Crear Unidad
                    </div>
                    <div class="box-body">
                        <?php $this->renderPartial('_form', array('unidad'=>$unidad)) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Lista de Unidades Existentes
                    </div>
                    <div class="box-body">
                         <?php $this->renderPartial('listaunidad',array('listaunidad'=>$listaunidad))?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                       Cargos en Unidad
                    </div>
                    <div class="box-body">
                        <div id="contenedorcargounidad">
                            <div class="callout callout-danger">
                                <h4>Elija Una Unidad</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="Unidadcargo" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Registrar Cargo</h4>
            </div>
            <div class="modal-body"">
            <div id="contenedorUnidadCargo">
                <?php $this->renderPartial('form_cargo',array('cargo'=>$cargo))?>
            </div>
        </div>
        <div class="modal-footer clearfix">
            <?php echo CHtml::tag('button',array('id'=>'btncargounidad','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Guardar',true)?>
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
</div>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
?>
<?php Yii::app()->clientScript->registerScript('convenio_institucion','
    $("#btnunidad").on("click",function(){
         $("#unidad-form").submit();
    });
    EventoClick();
    function EventoClick(){
        $(".btnCargosUnidades").on("click",vercargos);
    }
    function vercargos(){
        $.ajax({
        url:$(this).attr("href"),
        type:"post",
        success:function(datos){
           $("#contenedorcargounidad").html(datos);
           $(".btnChangeState").bootstrapToggle();
                      $(".btnChangeState").on("change",function(){
                           $.ajax({
                             url:$(this).attr("data-url"),
                                 type:"get"
                           });
                      });
        }
      });
     return false;
    }
    $("#btncargounidad").on("click",crearCargo);
    function crearCargo(){
        $("#cargounidad").val($("#id_unidad_cargo").val());
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('Unidad/formCrearCargo')).'",
            type:"post",
            data:$("#cargo-form").serialize(),
            success:function(datos){
                var contenido=$("<div>").html(datos);
                if(contenido.children("#flag").val()==null){
                $("#contenedorcargounidad").html(datos);
                $("#Unidadcargo").modal("hide");
                $(".btnChangeState").bootstrapToggle();
                      $(".btnChangeState").on("change",function(){
                           $.ajax({
                             url:$(this).attr("data-url"),
                                 type:"get"
                           });
                      });
                }
                else{
                    $("#contenedorUnidadCargo").html(datos);
                }
            }
        });
        return false;
    }

');