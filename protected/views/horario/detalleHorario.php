<?php
    $this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i> ',['horario/index','id'=>$modelHorario->id_horario])." Lista de horarios";
    $this->breadcrumbs=array(
        'Horarios',
    );
?>


<div class="row">
    <div class="col-md-3">
        <div class="box box-solid box-primary">
            <div class="box-header">Turnos disponibles</div>
            <div class="box-body">
                <ul class="list-turno">
                    <?php foreach(Turno::model()->findAll() as $item):?>
                    <li>
                        <input type="radio" name="iCheck"
                            data-id_turno="<?php echo $item->id_turno;?>"
                            data-h_start="<?php echo date('H:i',strtotime($item->hora_entrada));?>"
                            data-hh_start="<?php echo date('G',strtotime($item->hora_entrada)); ?>"
                            data-mm_start="<?php echo date('i',strtotime($item->hora_entrada))*1; ?>"
                            data-h_end="<?php echo date('H:i',strtotime($item->hora_salida));?>"
                            data-len="<?php echo MyHelpers::diffHoursInMinutes($item->hora_entrada,$item->hora_salida)?>"
                        >
                        <label><?php echo "[".date("H:i",strtotime($item->hora_entrada))." - ".date("H:i",strtotime($item->hora_salida))."] ".$item->nombre_turno; ?></label>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-solid box-primary">
            <div class="box-header">
                Turnos asignados
                <div class="box-tools">
                    <a href="#" class="btn btn-primary btn-save-turno-horario"><i class="fa fa-save"></i> Guardar</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-border table-bordered table-turno" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="5%"></th>
                            <?php for($i=0;$i<$modelHorario->total_dias;$i++):?>
                                <th>Dia <?php echo $i+1;?></th>
                            <?php endfor;?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0;$i<24;$i++):?>
                            <tr>
                                <th><?php printf("%02d:00",$i)?></th>
                                <?php for($j=0;$j<$modelHorario->total_dias;$j++):?>
                                    <td></td>
                                <?php endfor;?>
                            </tr>
                        <?php endfor;?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<?php echo CHtml::beginForm(null,"post",["id"=>"form-turno-horario"]);?>

<?php echo CHtml::endForm();?>
<div id="template" style="display: none;">
    <div class="block-h">
        <a href="#">&times;</a>
        <p>12:00 - 14:00</p>
        <?php echo CHtml::activeHiddenField(new HorarioTurno(),'[1]id_turno');?>
        <?php echo CHtml::activeHiddenField(new HorarioTurno(),'[1]dia_semana');?>
    </div>
</div>

<script>
    var h_list=[
        <?php foreach($modelHorario->horarioTurno as $itemH):?>
        {
            id_turno:'<?php echo $itemH->id_turno;?>',
            h_start:'<?php echo date('H:i',strtotime($itemH->turno->hora_entrada));?>',
            hh_start:'<?php echo date('G',strtotime($itemH->turno->hora_entrada)); ?>',
            mm_start:'<?php echo date('i',strtotime($itemH->turno->hora_entrada))*1; ?>',
            h_end:'<?php echo date('H:i',strtotime($itemH->turno->hora_salida));?>',
            day:<?php echo $itemH->dia_semana;?>,
            len:<?php echo MyHelpers::diffHoursInMinutes($itemH->turno->hora_entrada,$itemH->turno->hora_salida)?>
        },
        <?php endforeach;?>
    ];
</script>

<?php
Yii::app()->clientScript->registerScript('chooseTurno','
    $(document).ready(function(){
        var edit=false;
        var event=0;

        $("input[type=\'radio\']").each(function(){
            var self = $(this),
            label = self.next(),
            label_text = label.text();
            label.remove();
            self.iCheck({
                radioClass: "iradio_line-blue",
                insert: "<div class=\'icheck_line-icon\'></div>" + label_text
            });
        });

        $("input[type=\'radio\']").on("ifChecked", function(event){
            edit=true;
        });

        $.each(h_list,function(i,item){
            renderComplete(item);
        });

        $(".table-turno>tbody tr>td").on("click",function(){
            if(edit){
                var $item=$("input[type=\'radio\']:checked");
                var item={
                    id_turno:$item.attr("data-id_turno"),
                    h_start:$item.attr("data-h_start"),
                    hh_start:$item.attr("data-hh_start"),
                    mm_start:$item.attr("data-mm_start"),
                    h_end:$item.attr("data-h_end"),
                    day:$(this).index(),
                    len:$item.attr("data-len")
                };
                renderComplete(item);
            }
        });

        $(".table-turno>tbody tr>td").hover(function(){
            var index=$(this).index()-1;
            $(".table-turno>tbody tr").each(function(){
                $(this).children("td").eq(index).addClass("column-hovered");
            });
        },function(){
            $(".table-turno>tbody tr>td").removeClass("column-hovered");
        });

        function renderComplete(item){
            var $item=$("#template").children().clone(true);
            var $cell=$(".table-turno>tbody>tr").eq(item.hh_start).children("td").eq(item.day-1);

            var width=$cell.width();
            var height=$cell.parent("tr").height()/60;

            $item.width(width);
            $item.height(item.len*height);
            $item.children("p").text(item.h_start+" - "+item.h_end);
            $item.children("[id$=\'id_turno\']").val(item.id_turno);
            $item.children("[id$=\'dia_semana\']").val(item.day);

            $("#form-turno-horario").append($item);

            var pos=$cell.offset();
            pos.left=pos.left+(parseFloat($cell.css("padding-left")));
            pos.top=pos.top+height*item.mm_start;

            $item.offset(pos);
            rename();
         }

        function rename(){
            $("form#form-turno-horario>.block-h").each(function(i){
                $(this).children("[id$=\'id_turno\']").attr("name","HorarioTurno["+i+"][id_turno]").attr("id","HorarioTurno_"+i+"_id_turno");
                $(this).children("[id$=\'dia_semana\']").attr("name","HorarioTurno["+i+"][dia_semana]").attr("id","HorarioTurno_"+i+"_dia_semana");
            });
        }

         $(".block-h>a").on("click",function(){
            $(this).parent(".block-h").remove();
            rename();
            return false;
         });

         $(".btn-save-turno-horario").on("click",function(){
            $("#form-turno-horario").submit();
            return false;
         })
    });
');
?>

