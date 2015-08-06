<?php
    $this->pageTitle='Agenda de cirugias programadas';
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <div class="box-title">
                    Agenda
                </div>
            </div>
            <div class="box-body">
                <div id="cirugia"></div>
            </div>
        </div>
    </div>
</div>

<?php
$cadena='';
foreach($listaProg as $itemC){
    $cadena.=",{url_update:'".CHtml::normalizeUrl(['updateCirugia','id_c'=>$itemC->id_c])."',url_create:'".CHtml::normalizeUrl(['createCirugia','id_c'=>$itemC->id_c])."',title:"."'{$itemC->historial->paciente->personapa->nombreCompleto}',id:{$itemC->id_c},className:'evento',start:'{$itemC->fecha_hora_prog}',end:'".date("Y-m-d H:i",strtotime("+".$itemC->duracion_aprox." minute",strtotime($itemC->fecha_hora_prog)))."'}";
}
$cadena='['.substr($cadena,1).']';
?>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/fullcalendar.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/fullcalendar.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/lang-all.js',CClientScript::POS_END);

Yii::app()->clientScript->registerScript('agenda','

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
		eventRender:function(event,element){
		    element.popover({
		        title:event.title,
		        placement:\'top\',
		        html:true,
		        trigger:"click",
		        content:"<div class=\'btn-group-vertical\'><button data-url="+event.url_create+" type=\'button\' class=\'btn btn-primary btn-sm btn-create-event\'>Registrar cirugia</button><button data-url="+event.url_update+" type=\'button\' class=\'btn btn-primary btn-sm btn-reprogram-event\'>Reprogramar</button><button type=\'button\' class=\'btn btn-danger btn-sm btn-remove-event\' data-index=\'"+event.id+"\'>Cancelar</button></div>"
		    });
		    element.on("click",function(){
		        $(".evento").not(this).popover("hide");
		        $(".btn-remove-event").on("click",function(){
		            var id_c=$(this).data("index");
		            $.ajax({
		                url:"'.CHtml::normalizeUrl(['cirugia/removeCirugiaAjax']).'",
		                data:{id_c:id_c},
		                method:"get",
		                success:function(){
                            $("#cirugia").fullCalendar("removeEvents",id_c);
                            $(this).popover("hide");
		                }
		            });
		        });

		        $(".btn-create-event").on("click",function(){
                    window.location.replace($(this).data("url"));
		        });

		        $(".btn-reprogram-event").on("click",function(){
                    window.location.replace($(this).data("url"));
		        });
		    });
		},
		events: '.$cadena.'
	});
});
');
?>