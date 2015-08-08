<?php $this->renderPartial('/layouts/_cabeceraReporte',['modelH'=>$sala->internacion->historial,'titulo'=>'COMPROBANTE DE ASIGNACION DE SALA']);?>

<table width="100%">
    <tr>
        <td width="30%"></td>
        <td width="40%"><?php echo 'Comprobante de ';
                echo ($salaInicial==null)?'asignacion de sala':'cambio de sala';?></td>
        <td width="30%"></td>
    </tr>
</table>

<?php $this->renderPartial('/layouts/_pieReporte');?>