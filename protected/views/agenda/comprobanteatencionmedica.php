<html>
<head>
    <title>
        <h2 align="center">Atencion medica</h2>
    </title>
</head>
<body>
<table>
    <tr>
        <td><i>PACIENTE:</i>&nbsp;&nbsp;&nbsp;<?php echo $cita->idPaciente->personapa->getNombreCompleto();?></td>

        <td>HISTORIAL:&nbsp;&nbsp;&nbsp;<?php echo $cita->idPaciente->personapa->codigo;?></td>
    </tr>
    <tr>
        <td><b><i>FECHA y HORA:</i></b>&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y H:i:s");?></td>
    </tr>
    <tr>
        <td>TIPO PACIENTE:&nbsp;&nbsp;&nbsp;PARTICULAR&nbsp;&nbsp;&nbsp;</td>
        <td>TITULAR:&nbsp;&nbsp;&nbsp; -----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>INSTITUCION:&nbsp;&nbsp;&nbsp;-----</td>
    </tr>
    <tr>
        <td>USUARIO:&nbsp;&nbsp;&nbsp; Cristian</td>
    </tr>
</table>
<br>
<br>
<table>
    <tr>
        <td>NOMBRE DE LA ATENCION:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $cita->medicoConsultaServicio->idServicio->nombre_serv?></td>
    </tr>
    <tr>
        <td>MEDICO:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $cita->medicoConsultaServicio->idME->idMedico->medicopersona->getNombreCompleto()?></td>
    </tr>
    <tr>
        <td>ESPECIALIDAD:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $cita->medicoConsultaServicio->idME->idEspecialidad->nombre_especialidad?></td>
    </tr>
    <tr>
        <td>COSTO:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $cita->medicoConsultaServicio->idServicio->precioServicio->monto?></td>
    </tr>
    <tr>
        <td>FECHA Y HORA DE CONSULTA:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $cita->fecha.' '.$cita->hora_cita?></td>
    </tr>
</table>
</body>
</html>