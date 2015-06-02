<?php
    $salaInicial=SalaInternacion::model()->find("id_inter = {$sala->id_inter}  and fecha_entrada < '{$sala->fecha_entrada}' order by fecha_entrada DESC");
?>

<style>
    table{
        margin-bottom: 50px;
    }
</style>

<table width="100%">
    <tr>
        <td width="30%">Clinica Santa Ana</td>
        <td width="40%"></td>
        <td width="30%"><?php echo date('d-m-Y')?></td>
    </tr>
    <tr>
        <td width="30%"></td>
        <td width="40%"><?php echo 'Comprobante de ';
                echo ($salaInicial==null)?'asignacion de sala':'cambio de sala';?></td>
        <td width="30%"></td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td width="30%">Nombre del paciente:
        </td>
        <td width="70%"><?php echo $sala->internacion->historial->paciente->personapa->nombreCompleto;?></td>
    </tr>
</table>

<?php if($salaInicial==null):?>
    Sala asignada: <?php echo $sala->sala->numero_sala;?>
<?php else:?>
    Sala anterior: <?php echo $salaInicial->sala->numero_sala;?>
    Nueva sala: <?php echo $sala->sala->numero_sala;?>
<?php endif;?>