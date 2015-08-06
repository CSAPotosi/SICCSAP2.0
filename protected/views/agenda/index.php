
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                Especialidades disponibles
                            </div>
                            <div class="box-body">
                                <div class="input-group margin">
                                    <input class="form-control" type="text" id="buscaratencion" placeholder="Servico de Enfermeria">
                                        <span class="input-group-btn">
                                            <button class="btn btn-float btn-primary" type="button"><i class="fa fa-fw fa-search"></i></button>
                                        </span>

                                </div>
                                <div id="contenedoratencionmedica">
                                    <?php $this->renderPartial('atencionesdisponibles',array('atencionmedica'=>$atencionmedica))?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                cita
                            </div>
                            <div class="box-body">
                                <div id="contenedorformcita">
                                    <?php $this->renderPartial('_form',array('cita'=>$cita,'persona'=>$persona))?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        calendario
                    </div>
                    <div class="box-body">
                        <div id="calendar" class="fc fc-ltr fc-unthemed">
                            <div class="fc-toolbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $connection = Yii::app()->db;
        $sql = "select c.id_cita as id, c.fecha+c.hora_cita as start,c.fecha+c.hora_cita+'15 minutes' as end, (pe.nombres ||'  '|| pe.primer_apellido) as title,
                false as editable, c.estado_cita as estado, ser.nombre_serv as servinombre, 'popoverclass' as \"className\", pa.id_paciente as paciente
                from cita c
                inner join paciente pa on c.id_paciente=pa.id_paciente
                inner join persona pe on pa.id_paciente = pe.id
                inner join atencion_medica ate on c.medico_consulta_servicio=ate.id_servicio
                inner join servicio ser on ate.id_servicio=ser.id_servicio";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        $var = json_encode($rows);
    ?>
    </div>

<?php Yii::app()->clientScript->registerScript('pruebagabineteatencion ','
    eventoClick();
    eventoClickCita();
    calendario();

    function eventoClick(){
        $("tr").on("click",function(){
            $("#agendamedica").val($(this).attr("datanom"));
            $("#codigoatencion").val($(this).attr("data"));
        });
    }

    function eventoClickCita(){
        $("#btnformcita").on("click",RegistrarCita);
    }
    function RegistrarCita(){
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('agenda/RegistrarCita')).'",
            type:"post",
            data:$("#cita-form").serialize(),
            success:function(datos){
                if(datos.start!=null){
                     $("#calendar").fullCalendar("renderEvent",datos,true);
                }
                else{
                    $("#contenedorformcita").html(datos);
                    eventoClickCita();
                }
            }
        });
        return false;
    }

    function formulario(){
        $.ajax({
               url:"'.CHtml::normalizeUrl(array('agenda/BuscarAtencionMedica')).'",
               type:"post",
               data:{cadena:valor},
               success:function(datos){
                   $("#contenedoratencionmedica").html(datos);
                   eventoClick();
               }
        });
    }
    $("#buscaratencion").on("keyup",burcaratencionmedica);
    function burcaratencionmedica(){
        var valor=$(this).val();
        if(valor.length>=2 || valor.length==0){
            burcarvistaabtencion(valor);
        }
    }
    function burcarvistaabtencion(valor){
        $.ajax({
               url:"'.CHtml::normalizeUrl(array('agenda/BuscarAtencionMedica')).'",
               type:"post",
               data:{cadena:valor},
               success:function(datos){
                   $("#contenedoratencionmedica").html(datos);
                   eventoClick();
               }
        });
        return false;
    }
    function calendario(){
    $(function () {
        function ini_events(ele) {
          ele.each(function () {
            var eventObject = {
            title: $.trim($(this).text())
            };
            $(this).data("eventObject", eventObject);
            $(this).draggable({
              zIndex: 1070,
              revert: true,
              revertDuration: 0
            });
          });
        }
        ini_events($("#external-events div.external-event"));
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $("#calendar").fullCalendar({
          lang: "es",
          defaultView: "agendaDay",
          allDaySlot:false,
          slotDuration:"00:15:00",
          header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
          },
          buttonText: {
            today: "Hoy",
            month: "Mes",
            week:  "Semana",
            day: "Dia"
          },
          eventRender: function (event, element){
                if(event.estado==1){
                    var estado="Confirmado";
                    var dato="Recibo Medico";
                    var ide="confirmado";
                    var ocultar="btn btn-primary";
                    var ocultar1="btn btn-primary hidden";
                }
                else{
                    var estado="Reservado";
                    var dato="Confirmar Cita";
                    var ide="Reservado";
                    var ocultar="btn btn-primary hidden";
                    var ocultar1="btn btn-primary";
                }
		        element.popover({
		            title: "<center>"+estado+"</center>",
		            placement:\'top\',
		            html:true,
		            trigger : \'click\',
		            animation : \'true\',
		            content: "<div class=\'callout callout-success\'><h4>"+event.title+"</h4><p>"+event.servinombre+"</p></div><br><center><a class=\'"+ocultar+"\' href=\'/SICCSAP2.0/index.php?r=/agenda/ComprobanteAtencionMedica&id="+event.id+"\' target=\'_blank\'>"+dato+"</a><a id="+ide+" class=\'"+ocultar1+"\' href=\'/SICCSAP2.0/index.php?r=/agenda/ActualizarEstadoCita&cita="+event.id+"&idpaciente="+event.paciente+"\'>"+dato+"</a></br><br><a href=\'/SICCSAP2.0/ind\ex.php?r=historialPaciente/view&id="+event.paciente+"\' class=\'"+ocultar+"\'>Ver Historial</a></center>",
                });

                element.on(\'click\',function(){
                    $(\'.popoverclass\').not(this).popover(\'hide\');
                    $("#Confirmado").on("click",function(){
                        $.ajax({
                            url: \''.CHtml::normalizeUrl(array("/agenda/")).'\',
                            type: \'post\',
                            data: data,
                            success: function(datos)
                            {

                            }
                        });
                        return false;
                    });
                });

              },
          events:
            '.$var.',
          eventClick: function(event){
          },
           editable: true,
           droppable: true,
           drop: function (date, allDay) {
           var originalEventObject = $(this).data("eventObject");
           var copiedEventObject = $.extend({}, originalEventObject);
           copiedEventObject.start = date;
           copiedEventObject.allDay = allDay;
           copiedEventObject.backgroundColor = $(this).css("background-color");
           copiedEventObject.borderColor = $(this).css("border-color");
           $("#calendar").fullCalendar("renderEvent", copiedEventObject, true);
           if ($("#drop-remove").is(":checked")) {
               $(this).remove();
           }
          }
        });
        var currColor = "#3c8dbc";
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
            e.preventDefault();
            currColor = $(this).css("color");
        });
       });
    }

');