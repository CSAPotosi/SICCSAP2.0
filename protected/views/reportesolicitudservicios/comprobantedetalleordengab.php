<html>
<head>
    <title>
        <?php $servi=Servicio::model()->findByPk($detalle->id_servicio)?>
        <h2 align="center">ORDEN DE EXAMEN DE <?php echo strtoupper($servi->examenGabinete->idCatGab->nombre_cat_gab)?></h2>
    </title>
</head>
<body>
<table cellpadding="20px" border="2px">
    <tr>
        <td><i>PACIENTE:</i>&nbsp;&nbsp;&nbsp;<?php echo $solicitud->idHistorial->paciente->personapa->getNombreCompleto();?></td>

        <td>HISTORIAL:&nbsp;&nbsp;&nbsp;<?php echo $solicitud->idHistorial->paciente->personapa->codigo;?></td>
    </tr>
    <tr>
        <td><b><i>FECHA y HORA:</i></b>&nbsp;&nbsp;&nbsp;<?php echo $solicitud->fecha_solicitud;?></td>
    </tr>
    <tr>
        <td>TIPO PACIENTE:&nbsp;&nbsp;&nbsp;PARTICULAR&nbsp;&nbsp;&nbsp;</td>
        <td>TITULAR:&nbsp;&nbsp;&nbsp; -----&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>INSTITUCION:&nbsp;&nbsp;&nbsp;-----</td>
    </tr>
    <tr>
        <td>USUARIO:&nbsp;&nbsp;&nbsp; Cristian</td>
    </tr>
    <br>
    <tr>
        <td><h4>NOMBRE DEL SERVICIO</h4></td>

        <td align="center"><h4>CANTIDAD</h4></td>

    </tr>
    <tr>

        <td><h3><i><?php echo $servi->nombre_serv?></i></h3></td>
        <td align="center"><h3><?php echo $detalle->cantidad?></h3></td>

    </tr>
</table>
</body>
</html>