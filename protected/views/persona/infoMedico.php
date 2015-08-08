<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/Medicos'])." Medicos";
$this->breadcrumbs=array(
    'Medicos'=>array('Medico'),
    'Nuevo Medico',
);
?>
<div class="row">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3>Informacion Medica</h3>
                </div>
                <div class="box-body">
                    <?php $this->renderPartial('/medico/_form_medico',array('medico'=>$medico,'medico_especialidad'=>$medico_especialidad,'id'=>$id))?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3>Especialidades Disponibles</h3>
                </div>
                <div class="box-body" >
                    <div id="contenedor_especialidad">
                        <?php $this->renderPartial('/medico/_form_especialidades',array('listaespecialidad'=>$listaespecialidades))?>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn bg-red-gradient" data-target="#especialidad" data-toggle="modal">Agregar Especialidad</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade in" id="especialidad" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Especialidades</h4>
            </div>
            <div class="modal-body" id="contenedorformespecialidad">
                <?php $this->renderPartial('/medico/especialidad_formulario',array('especialidad'=>new Especialidad))?>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnespecialidad','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Registrar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="updEspecialidad" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Especialidades</h4>
            </div>
            <div class="modal-body" id="contenedorformespecialidadupd">

            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnupdespecialidad','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Registrar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('controlmedicos','
    EventosEspecialidad();
    $("#btnespecialidad").on("click",CrearEspecialidad);
    function CrearEspecialidad(){
        $.ajax({
                url:"'.CHtml::normalizeUrl(array('Medico/CrearEspecialidadAjax')).'",
                data:$("#especialidad-form").serialize(),
                type:"post",
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_especialidad").html(datos);
                        $("#especialidad").modal("hide");
                        EventosEspecialidad();
                    }
                    else{
                        $(\'#contenedorformespecialidad\').html(datos);
                    }
                }
        });
        return false;
    }
    function EventosEspecialidad(){
        $("input[type=\'checkbox\'],input[type=\'radio\']").iCheck({
                checkboxClass:"icheckbox_minimal-red",
                radioClass:"iradio_minimal-blue"
        });
        $(".btnUpdateespecialidad").on("click",AbrirEs);
        $("#btnupdespecialidad").on("click",UpdateEspe);
        $(".EspeCheck").on("ifChecked",function(){
            var espe=$(this).val();
            darEspe(espe);
        });
        $(".EspeCheck").on("ifUnchecked",function(){
            var espe=$(this).val();
            devEspe(espe);
        });
    }
    function AbrirEs(){
        $.ajax({
            url:$(this).attr("href"),
            type:"post",
            success:function(datos){
                $("#contenedorformespecialidadupd").html(datos);
            }
        });
        $("#updEspecialidad").modal("show");
        return false;
    }
    function UpdateEspe(){
        $.ajax({
                url:"'.CHtml::normalizeUrl(array('Medico/UpdateEspecialidadAjax')).'",
                data:$("#especialidad-form-upd").serialize(),
                type:"post",
                success:function(datos){
                    var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_especialidad").html(datos);
                        $("#updEspecialidad").modal("hide");
                    }
                    else{
                        $(\'#contenedorformespecialidadupd\').html(datos);
                    }
                }
        });
        return false;
    }

    function darEspe(espe){
        var lista=$(".asignados");
        var estado=1;
        lista.each(function( index ){
            if($(this).children().val()==$("#"+espe+"").children().val()){
               estado=0;
            }
        });
        if(estado==1){
            $("#lista_especialidades").append($("#"+espe+""))
            $("#"+espe+"").children("[name=\'ocultar\']").addClass("hide");
        }
        else{
            alert("la especialidad ya esta asignada");
            $("#"+espe+"").children().children(".EspeCheck")=false;
        }
    }

    function devEspe(espe){
        $("#contenedor_lista").append($("#"+espe+""));
        $("#"+espe+"").children("[name=\'ocultar\']").removeClass("hide");
    }
    $("#btnmedicoespe").on("click",crearmedico);
    function crearmedico(){
        $("#medico-espe-form").submit();
    }
    $("#btnmedicoespeupd").on("click",updatemedico);
    function updatemedico(){
        $("#medico-espe-update").submit();
    }
');