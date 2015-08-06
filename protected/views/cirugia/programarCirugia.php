<?php
/* @var $this CirugiaController */

$this->breadcrumbs=array(
	'Cirugia'=>array('/cirugia'),
	'ProgramarCirugia',
);

$this->pageTitle='Programacion de cirugia';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$model))?>

<nav class="navbar navbar-menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuHistoria" aria-expanded="false">
                <span class="sr-only">Opciones de historia</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menuHistoria">
            <ul class="nav navbar-nav">
                <li ><?php echo CHtml::link("<i class='fa fa-list'></i> Historia clinica",array('historialPaciente/view','id'=>$model->id_historial))?></li>
                <li><?php echo ($model->paciente->estado_paciente!='INTERNADO')?CHtml::link("<i class='fa fa-wheelchair'></i> Nueva internacion",['internacion/createInternacion','id'=>$model->id_historial]):CHtml::link("<i class='fa fa-wheelchair'></i> Internacion actual",['internacion/index','id'=>$model->internacionActual->id_inter]); ?></li>
                <li class="dropdown active">
                    <?php echo CHtml::link('Quirofanos <span class="caret"></span>',['#'],['class'=>'dropdown-toggle animate','data-toggle'=>'dropdown']);?>
                    <ul class="dropdown-menu" role="menu">
                        <li class="active"><?php echo CHtml::link('Programar cirugia',['cirugia/programarCirugia','id_h'=>$model->id_historial]);?></li>
                        <li><?php echo CHtml::link('Registrar cirugia',['cirugia/createCirugia','id_h'=>$model->id_historial]);?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="row">
    <div class="col-md-4">
        <div class="box box-solid box-primary" id="box-programacion">
            <div class="box-header">
                <div class="box-title">
                    Formulario de programacion de cirugias
                </div>
            </div>
            <div class="box-body">
                    <?php $this->renderPartial('_formCirugia',['modelCirugia'=>$modelCirugia,'modelParticipe'=>$modelParticipe]);?>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <div class="box-title">
                    Agenda de cirugias
                </div>
            </div>
            <div class="box-body">
                <div id="cirugia"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-primary" id="modalBuscaPersona" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buscar personas</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnClose','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>

<?php
    $cadena='';
    foreach(Cirugia::model()->findAll("estado_cirugia = 'PROGRAMADA' and fecha_hora_prog >= NOW()") as $itemC){
        $cadena.=',{title:'."'{$itemC->historial->paciente->personapa->nombreCompleto}',start:'{$itemC->fecha_hora_prog}',end:'".date("Y-m-d H:i",strtotime("+".$itemC->duracion_aprox." minute",strtotime($itemC->fecha_hora_prog)))."'}";
    }
    $cadena='['.substr($cadena,1).']';
?>



<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/fullcalendar.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/fullcalendar.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/lang-all.js',CClientScript::POS_END);

Yii::app()->clientScript->registerScript('calendario','

function cargarFechas(){
    $("#Cirugia_fecha_hora_prog").datetimepicker({
        locale:"es",
        defaultDate:new Date(),
        format:"YYYY-MM-DD HH:mm",
        minDate:"'.date('m/d/Y',strtotime('+0 day')).'"
    });



}
cargarFechas();

$("#modalBuscaPersona").on("show.bs.modal",function(){
    $.ajax({
        url:"'.CHtml::normalizeUrl(['cirugia/loadBuscadorAjax']).'",
        success:function(datos){
            $("#modalBuscaPersona .modal-body").html(datos);
            $("input[name=\'tipo_persona\']").iCheck({radioClass:"iradio_square-blue"});
            $("#txtPersona").on("keyup",function(){
                var tipo=$("input[name=\'tipo_persona\']:checked").val();
                var texto=$(this).val();
                $.ajax({
                    beforeSend:function(){$("#lista-completa").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>"); },
                    url:"'.CHtml::normalizeUrl(['cirugia/loadListaPersonas']).'",
                    data:{tipo:tipo,valor:texto.toUpperCase()},
                    method:"get",
                    success:function(datos){
                        $("#lista-completa .box-body").html(datos);
                        $(".users-list li").on("click",function(){
                            $("#ParticipanteCirugia_id_per").val($(this).data("id"));
                            $("#nombre_medico").val($(this).find(".users-list-name").text());
                            $("#modalBuscaPersona").modal("hide");
                        });
                    },
                    complete:function(){ $("#lista-completa .overlay").remove();}
                });
            });
        }
    });
});

$("#form-programacion").on("submit",miFuncion=function(e){
    $.ajax({
        beforeSend:function(){ $("#box-programacion").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>"); },
        url:$(this).attr("action"),
        data:$(this).serialize(),
        method:"post",
        success:function(datos){
            if($("<div>").append(datos).find("#form-programacion").length>0){
                $("#box-programacion .box-body").html(datos);
                $("#form-programacion").on("submit",miFuncion);
                cargarFechas();
            }
            else{
                alert(datos);
                var fecha=$("#Cirugia_fecha_hora_prog").data("DateTimePicker").date();
                fecha2=moment(fecha);fecha2.add($("#Cirugia_duracion_aprox").val(),"minutes");
                $("#cirugia").fullCalendar("gotoDate",fecha);
                $("#cirugia").fullCalendar("changeView","agendaDay");
                $("#cirugia").fullCalendar("renderEvent",{start:fecha,end:fecha2,color:"#f00",title:datos},true);
            }
        },
        complete:function(){ $("#box-programacion .overlay").remove(); }
    });
    e.preventDefault();
});
$(function() {
	$("#cirugia").fullCalendar({
		header: {
			left: "prev,next today",
			center: "title",
			right: "month,agendaWeek,agendaDay"
		},
		defaultDate: "'.date('Y-m-d').'",
		lang:"es",
		allDaySlot:false,
		editable: false,
		eventLimit: true, // allow "more" link when too many events
		events: '.$cadena.'
	});
});
');
?>