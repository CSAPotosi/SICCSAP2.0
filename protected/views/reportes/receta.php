<?php $this->renderPartial('/layouts/_cabeceraReporte',['modelH'=>$modelTratamiento->consulta->idHistoria,'titulo'=>'RECETA']);?>

<table class="cuerpo" width="100%">
    <tr>
        <th width="25%">MEDICAMENTO</th>
        <th width="12.5%">CANT. SOLICITADA</th>
        <th width="12.5%">CANT. DOSIS</th>
        <th width="25%">VIA</th>
        <th width="25%">PAUTA</th>
    </tr>
    <?php foreach($modelTratamiento->recetas as $item):?>
    <tr>
        <td><?php echo $item->medicamento->descripcion;?></td>
        <td><?php echo $item->cant_solicitada;?></td>
        <td><?php echo $item->cant_dosis;?></td>
        <td><?php echo $item->via;?></td>
        <td><?php echo $item->pauta;?></td>
    </tr>
    <?php endforeach;?>
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
        text-align: left;
        font-size: 9pt;
    }
    .cuerpo td{
        font-size: 8.5pt;
        text-align: left;
    }
</style>