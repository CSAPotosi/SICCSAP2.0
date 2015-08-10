<?php
    $estado=[
        1=>'ACTIVO',
        2=>'OCUPADO',
        3=>'MANTENIMIENTO',
        4=>'INACTIVO'
    ];
?>

<table class="titulo" width="100%">
    <tr>
        <th>CENSO DE SALAS (<?php setlocale(LC_TIME, ''); echo strtoupper(strftime('%A, %d de %B del %Y.'));?>)</th>
    </tr>
</table>

<table width="100%" class="cuerpo">
    <tr>
        <th>Numero sala</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Paciente que ocupa</th>
    </tr>
    <?php foreach(TipoSala::model()->findAll() as $itemTipo):?>
        <?php foreach($itemTipo->salas as $itemSala):?>
            <tr>
                <td><?php echo $itemSala->numero_sala;?></td>
                <td><?php echo $itemTipo->servicio->nombre_serv;?></td>
                <td><?php echo $estado[$itemSala->estado_sala];?></td>
                <td><?php
                    if($itemSala->estado_sala==2)
                        echo $itemSala->internacionActual->internacion->historial->paciente->personapa->nombreCompleto;
                    else
                       echo 'NINGUNO';
                    ?></td>
            </tr>
        <?php endforeach;?>
    <?php endforeach;?>
</table>


<style>
    .titulo th{
        text-align: center;
        font-size: 12pt;
    }
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