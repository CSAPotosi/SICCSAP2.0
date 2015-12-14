<?php $pacientes=Paciente::model()->findAll();?>
<center><h1 align="center">PACIENTE CLINICA SANTA ANA</h1></center>
<B>FECHA DE REPORTE:&nbsp;&nbsp;&nbsp;</B><?php echo date('d-m-Y')?>
    <table width="100%" class="cuerpo">
        <tr>
            <th width="5%">CODIGO HISTORIAL</th>
            <th width="5%">IDENTIFICACION PERSONAL</th>
            <th width="5%">TIPO DOCUMENTO</th>
            <th width="8%">SEXO</th>
            <th width="20%">NOMBRE COMPLETO</th>
            <th width="10%">SANGRE</th>
            <th width="10%">FECHA APERTURA HISTORIAL</th>
            <th width="15%">FECHA NACIMIENTO</th>
            <th width="10%">ESTADO CIVIL</th>
            <th width="10%">PAIS NACIMEINTO</th>
            <th width="10%">PROVINCIA</th>
            <th width="10%">LOCALIDAD</th>
            <th width="10%">NIVEL DE ESTUDIO</th>
            <th width="10%">PAIS DONDE VIVE</th>
            <th width="10%">DIRECCION</th>
            <th width="5%">TELEFONO</th>
            <th width="5%">CELULAR</th>
            <th width="15%">EMAIL</th>
        </tr>
        <?php foreach($pacientes as $item):?>
            <tr>
                <td><?php echo $item->personapa->codigo?></td>
                <td><?php echo $item->personapa->dni?></td>
                <td><?php echo $item->personapa->tipo_documento?></td>
                <td><?php echo $item->personapa->sexo?></td>
                <td><?php echo $item->personapa->nombreCompleto?></td>
                <td><?php echo $item->grupo_sanguineo_paciente?></td>
                <td><?php echo $item->pacihisto->fecha_creacion?></td>
                <td><?php echo $item->personapa->fecha_nacimiento?></td>
                <td><?php echo $item->personapa->estado_civil?></td>
                <td><?php echo $item->personapa->paisNacimiento->nombre?></td>
                <td><?php echo $item->personapa->provincia?></td>
                <td><?php echo $item->personapa->localidad?></td>
                <td><?php echo $item->personapa->nivel_estudio?></td>
                <td><?php echo $item->personapa->paisVive->nombre?></td>
                <td><?php echo $item->personapa->direccion?></td>
                <td><?php echo $item->personapa->telefono?></td>
                <td><?php echo $item->personapa->celular?></td>
                <td><?php echo $item->personapa->email?></td>
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
