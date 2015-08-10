<?php $listaconvenios=ConvenioInstitucion::model()->findByPk($convenioinsti)?>
    <h4 align="center">PACIENTES ASEGURADOS</h4>
    NOMBRE DE CONVENIO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $listaconvenios->nombre_convenio?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTITUCION O EMPRESA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $listaconvenios->idInsti->nombre?>
    <?php if($asegurados!=""){?>
        <table width="100%" class="cuerpo">
            <tr>
                <th width="15%">NOMBRE CONVENIO</th>
                <th width="15%">INSTITUCION</th>
                <th width="15%">PACIENTE</th>
                <th width="15%">HISTORIAL</th>
                <th width="15%">FECHA INICIO</th>
                <th width="15%">FECHA ACTUALIZACION</th>
                <th width="15%">TIPO ASEGURADO</th>
                <th width="15%">ESTADO</th>
            </tr>
            <?php $listaasegurados=SeguroConvenio::model()->findAll(array('condition'=>"id_convenio_institucion='{$listaconvenios->id_convenio}'",));?>
            <?php foreach($listaasegurados as $ase):?>
            <tr>
                <td><?php echo $listaconvenios->nombre_convenio?></td>
                <td><?php echo $listaconvenios->idInsti->nombre?></td>
                <td><?php echo $ase->PacienteAsegurado->personapa->nombreCompleto?></td>
                <td><?php echo $ase->PacienteAsegurado->personapa->codigo?></td>
                <td><?php echo $ase->fecha_inicio?></td>
                <td><?php echo $ase->fecha_actualizacion?></td>
                <td><?php echo $ase->tipo_asegurado?></td>
                <td><?php echo ($ase->estado==true?'ACTIVO':'INACTIVO')?></td>
            </tr>
            <?php endforeach;?>
        </table>
    <?php }?>
    <br>
<h4 align="center">SERVICIOS CONVENIADOS</h4>
    <?php if($servicios=="servicios"){?>
        <table width="100%" class="cuerpo">
            <tr>
                <th width="15%">NOMBRE SERVICIO</th>
                <th width="15%">COSTO SERVICIO</th>
                <th width="15%">DESCUENTO</th>
                <th width="15%">FECHA CREACION</th>
                <th width="15%">FECHA ACTUALIZACION</th>
                <th width="35%">ESTADO</th>
                <th width="35%">DESCRIPCION</th>
            </tr>
            <?php echo $listaservicios=ConvenioServicios::model()->findAll(array('condition'=>"id_convenio_institucion='{$listaconvenios->id_convenio}'",))?>
            <?php foreach($listaservicios as $ser):?>
                <tr>
                    <td><?php echo $ser->idServicio->nombre_serv?></td>
                    <td><?php echo $ser->idServicio->precioServicio->monto?></td>
                    <td><?php echo $ser->descuento_servicio?></td>
                    <td><?php echo $ser->fecha_creacion?></td>
                    <td><?php echo $ser->fecha_actualizacion?></td>
                    <td><?php echo ($ser->estado=='1'?'ACTIVO':'INACTIVO')?></td>
                    <td><?php echo $ser->descripcion?></td>
                </tr>
            <?php endforeach;?>
        </table>
    <?php }?>
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