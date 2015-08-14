<?php $this->renderPartial('/layouts/_cabeceraReporte',['modelH'=>$consulta->idHistoria,'titulo'=>'DETALLE DE CONSULTA']);?>

<table class="cuerpo" width="100%">
    <tr>
        <th width="25%">
            ANAMNESIS
        </th>
        <td width="75%">
            <?php echo $consulta->anamnesis;?>
        </td>
    </tr>

    <tr>
        <th>
            EXPLORACION
        </th>
        <td>
            <?php echo $consulta->exploracion;?>
        </td>
    </tr>

    <tr>
        <th>
            DIAGNOSTICO
        </th>
        <td>
            <?php echo $consulta->diagnostico;?>
        </td>
    </tr>

    <tr>
        <th>
            OBSERVACIONES
        </th>
        <td>
            <?php echo $consulta->observaciones;?>
        </td>
    </tr>
    <tr>
        <th>CLASIFICACION</th>
        <td>
            <?php foreach($consulta->itemsCie as $cie):?>
                <?php echo $cie->itemCie->titulo;?> <br/>
            <?php endforeach;?>
        </td>
    </tr>
</table>


<?php $this->renderPartial('/layouts/_pieReporte');?>

<style>
    .cuerpo{
        border-collapse: collapse;
    }

    .cuerpo td, .cuerpo th{
        padding: 3px;
    }
    .cuerpo th{
        text-align: right;
        font-size: 9pt;
    }
    .cuerpo td{
        font-size: 8.5pt;
        text-align: left;
    }
</style>