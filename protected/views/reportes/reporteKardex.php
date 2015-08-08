<?php $this->renderPartial('/layouts/_cabeceraReporte',['modelH'=>$modelInternacion->historial,'titulo'=>'KARDEX DE ENFERMERIA']);?>

<table width="100%" class="cuerpo">
    <tr>
        <th width="15%">FECHA</th>
        <th width="15%">HORA</th>
        <th width="35%">RESPUESTA A TRATAMIENTO</th>
        <th width="35%">DIETA</th>
    </tr>
    <?php foreach($modelInternacion->evolucion as $item):?>
        <tr>
            <td><?php echo date('d-m-Y',strtotime($item->fecha_evo_enf));?></td>
            <td><?php echo date('H:i',strtotime($item->fecha_evo_enf));?></td>
            <td><?php echo $item->respuesta_tratamiento;?></td>
            <td><?php echo $item->dieta;?></td>
        </tr>
    <?php endforeach;?>
</table>


<?php $this->renderPartial('/layouts/_pieReporte');?>

<style>
    .cuerpo{
        border-collapse: collapse;
    }

    .cuerpo td, .cuerpo th{
        border: 1px solid;
        padding: 3px;
    }
    .cuerpo th{
        text-align: left;
        font-size: 9pt;
    }
    .cuerpo td{
        font-size: 8.5pt;
        text-align: left;
    }
</style>