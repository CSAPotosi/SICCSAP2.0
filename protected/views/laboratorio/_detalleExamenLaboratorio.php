<?php
$sexo=[0=>'AMBOS SEXOS',1=>'VARONES',2=>'MUJERES'];
?>

<table width="100%" class="cuerpo">

        <tr>
            <th width="30%">PARAMETRO</th>
            <th width="30%">VALOR</th>
            <th width="40%">VALORES NORMALES</th>
        </tr>
    <?php foreach($modeloDetalle->resultadoLab->detalleResultados as $item):?>
        <tr>
            <td><?php echo $item->parametro->nombre_par_lab;?></td>
            <td><?php echo '<b>'.$item->valor_resultado.'</b> '.$item->parametro->unidad_par_lab;?></td>
            <td>
                <?php foreach($item->parametro->rangosParametros as $itemPar):?>
                    <?php echo $itemPar->valor_normal." (de {$itemPar->edad_minima} a {$itemPar->edad_maxima} años, {$sexo[$itemPar->sexo_rango]} )<br/>";?>
                <?php endforeach;?>
            </td>
        </tr>
    <?php endforeach;?>

</table>


<table class="cuerpo2">
    <tr>
        <th width="40%">DIAGNOSTICO PRESUNTIVO:</th>
        <td width="60%"> <?php echo $modeloDetalle->resultadoLab->diagnostico;?></td>
    </tr>
    <tr>
        <th >OBSERVACIONES:</th>
        <td><?php echo $modeloDetalle->resultadoLab->observaciones;?></td>
    </tr>
</table>

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


    .cuerpo2{
        margin-top: 30px;
        border-collapse: collapse;
    }

    .cuerpo2 td, .cuerpo th{
        padding: 3px;
    }
    .cuerpo2 th{
        text-align: left;
        font-size: 9pt;
    }
    .cuerpo2 td{
        font-size: 8.5pt;
        text-align: left;
    }
</style>