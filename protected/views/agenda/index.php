<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                cita
                            </div>
                            <div class="box-body">
                                <?php $this->renderPartial('_form',array('cita'=>$cita))?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                Especialidades Disponibles
                            </div>
                            <div class="box-body">
                                <div class="input-group margin">
                                    <input class="form-control" type="text" id="buscaitemenf" placeholder="Servico de Enfermeria">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                                    </span>
                                </div>
                                <?php $this->renderPartial('atencionesdisponibles',array('atencionmedica'=>$atencionmedica))?>
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
<?php Yii::app()->clientScript->registerScript('pruebagabineteatencion ','
    $("tr").on("click",function(){
        alert("hola");
    });
    $(function () {
        function ini_events(ele) {
          ele.each(function () {
            var eventObject = {
            title: $.trim($(this).text())
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data("eventObject", eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($("#external-events div.external-event"));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $("#calendar").fullCalendar({
          lang: "es",
          defaultView: "agendaDay"
,          header: {
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

          events: [

          ],
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

');