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

<script>
    var h_list=[
        <?php foreach($modelHorario->horarioTurno as $itemH):?>
        {
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