<style>

    tbody th,tbody td{
        text-align: left;
        font-size: 10pt;
    }
    thead  tr th{
        font-size: 12pt;
        height: 50px;
    }
</style>

<table width="100%">
    <thead>
        <tr>
            <th colspan="4"><?php echo $titulo;?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>NOMBRE:</th>
            <td><?php echo $modelH->paciente->personapa->nombreCompleto;?></td>
            <th>CODIGO:</th>
            <td>CSA-<?php echo $modelH->paciente->personapa->codigo;?> </td>
        </tr>
        <tr>
            <th>NRO. DOC.:</th>
            <td>443434(CERT. NAC)</td>
            <th>FECHA NAC.:</th>
            <td><?php $modelH->paciente->personapa->fecha_nacimiento;

                ?>
            </td>
        </tr>
        <tr>
            <th>TIPO:</th>
            <td>
                <?php
                /*   if($modelHn->historial->paciente->seguro==null)
                       echo 'PARTICULAR';
                   else
                       echo 'ASEGURADO'
                */
                ?>

            </td>
            <th>FECHA:</th>
            <td><?php date('d-m-Y H:i');?>
            </td>
        </tr>
    </tbody>
</table>
<hr/>