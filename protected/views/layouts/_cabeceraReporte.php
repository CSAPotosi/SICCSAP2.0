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
            <th width="20%">PACIENTE:</th>
            <td width="40%"><?php echo $modelH->paciente->personapa->nombreCompleto;?></td>
            <th width="20%">CODIGO:</th>
            <td width="20%">CSA-<?php echo $modelH->paciente->personapa->codigo;?> </td>
        </tr>
        <tr>
            <th>NRO. DOC.:</th>
            <td><?php echo $modelH->paciente->personapa->dni?></td>
            <th>FECHA NAC.:</th>
            <td><?php
                if(date('Y-m-d',strtotime($modelH->paciente->personapa->fecha_nacimiento))=='0001-01-01')
                    echo date('Y-m-d',strtotime($modelH->paciente->personapa->fecha_nacimiento));
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
            <td><?php echo date('Y-m-d H:i');?>
            </td>
        </tr>
    </tbody>
</table>
<hr/>