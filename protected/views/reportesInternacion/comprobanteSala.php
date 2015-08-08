<?php $this->renderPartial('/layouts/_cabeceraReporte',['modelH'=>$sala->internacion->historial,'titulo'=>'COMPROBANTE DE ASIGNACION DE SALA']);?>

<table class="cuerpo" width="100%" >
    <tr>
        <th width="33%">SALA ASIGNADA</th>
        <th width="33%">TIPO DE SALA</th>
        <th width="33%">FECHA Y HORA DE ASIGNACION</th>
    </tr>
    <tr>
        <td><?php echo $sala->sala->numero_sala; ?></td>
        <td><?php echo $sala->sala->tipoSala->servicio->nombre_serv; ?></td>
        <td><?php echo date('Y-m-d H:i',strtotime($sala->fecha_entrada));  ?></td>
    </tr>
</table>

<?php $this->renderPartial('/layouts/_pieReporte');?>

<style>
    .cuerpo th{
        text-align: left;
        font-size: 9pt;
    }
    .cuerpo td{
        font-size: 8.5pt;
        text-align: left;
    }
</style>


