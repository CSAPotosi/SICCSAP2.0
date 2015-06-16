<html>
<head>
    <title>
        <h2 align="center">Orden de Laboratorio</h2>
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
    <br>
    <?php
    $servicio=DetalleSolicitudServicio::model()->findAll(array(
        'condition'=>"id_solicitud ='{$solicitud->id_solicitud}'",
    ));
    ?>
    <?php
    $listalaboratorio=array();

    ?>
    <?php foreach($servicio as $ser):?>
        <?php $det=Servicio::model()->findByPk($ser->id_servicio);?>
        <?php
        if($det->examenLaboratorio!=null){
            $listalaboratorio[]=$det->examenLaboratorio;
        }
        if($det->examenGabinete!=null){
            $listagabinete[]=$det->examenGabinete;
        }
        if($det->servicioClinico!=null){
            $listaotros[]=$det->servicioClinico;
        }
        ?>
    <?php endforeach;?>
    <tr>
        <td><h4>NOMBRE DEL SERVICIO</h4></td>

        <td align="center"><h4>CANTIDAD</h4></td>
    </tr>
    <?php if($listalaboratorio!=null){?>
        <?php
        $cat1=0;
        function cmp($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        }
        ?>
        <?php uasort($listalaboratorio,'cmp');?>
        <tr>
            <td><h3><i><u>LABORATORIO<?php echo $lab->id_cat_lab;?></u></i></h3></td>
        </tr>
        <?php foreach($listalaboratorio as $lab):?>
            <?php
            $cat2=$lab->id_cat_lab;
            if($cat1!=$cat2){?>
                <tr>
                    <td><h4><u><?php echo $lab->idCatLab->nombre_cat_lab;?></u></h4></td>
                </tr>
                <?php $cat1=$cat2;?>
            <?php }else{?>
                <?php $cat1=$cat2;
            }?>
            <tr>
                <td><?php echo $lab->serviciodelab->nombre_serv?></td>
                <?php $cantidad=DetalleSolicitudServicio::model()->find(array(
                    'condition'=>"id_solicitud='{$solicitud->id_solicitud}' and id_servicio='{$lab->serviciodelab->id_servicio}'",
                ))?>
                <td align="center"><?php echo $cantidad->cantidad?></td>
            </tr>
        <?php endforeach?>
    <?php }?>
</table>
</body>
</html>