<?php $examengabinte=CategoriaExGabinete::model()->findAll();?>
<center><h1 align="center">SERVICIOS GABINETE</h1></center>
<B>FECHA DE REPORTE:&nbsp;&nbsp;&nbsp;</B><?php echo date('d-m-Y')?>
<?php foreach($examengabinte as $ex):?>
<center><h3><?php echo $ex->nombre_cat_gab?></h3></center>
<table width="100%" class="cuerpo">
    <tr>
        <th width="20%">CODIGO SERVICIO</th>
        <th width="20%">NOMBRE SERVICIO</th>
        <th width="20%">UNIDAD SERVICIO</th>
        <th width="20%">FECHA CREACION</th>
        <th width="20%">FECHA ACTUALIZACION</th>
        <th width="20%">PRECIO DE SERVICIO</th>
    </tr>
    <?php $gabinete=ExamenGabinete::model()->findAll(array('condition'=>"id_cat_gab='{$ex->id_cat_gab}'"))?>
    <?php foreach($gabinete as $item):?>
        <tr>
            <td><?php echo $item->Serviciogab->codigo_serv;?></td>
            <td><?php echo $item->Serviciogab->nombre_serv;?></td>
            <td><?php echo $item->Serviciogab->unidad_serv?></td>
            <td><?php echo $item->Serviciogab->fecha_creacion;?></td>
            <td><?php echo $item->Serviciogab->fecha_actualizacion;?></td>
            <td><?php echo $item->Serviciogab->precioServicio->monto?></td>
        </tr>
    <?php endforeach;?>
</table>
<?php endforeach;?>


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
