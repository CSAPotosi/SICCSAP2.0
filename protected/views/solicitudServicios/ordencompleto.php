<h1>orden de solicitud</h1>
<?php $detalles=DetalleSolicitudServicio::model()->findAll(array(
    'condition'=>"id_solicitud ='{$solicitud->id_solicitud}'",
      ));
       $examenlab=array();
       $examengab=array();
?>
<?php foreach($detalles as $det):
    $servicio=Servicio::model()->findByPk($det->id_servicio);
    if($servicio->examenLaboratorio!=null){
        $examenlab[]=$servicio->examenLaboratorio;
    }
    if($servicio->examenGabinete!=null){
        $examengab[]=$servicio->examenGabinete;
    }
 endforeach?>
<?php if($examenlab!=null){?>
    <?php echo CHtml::link("<i class='fa fa-fw fa-file-text'></i>GENERAR ORDEN DE LABORATORIO",array('SolicitudServicios/reporteOrdenlab','id'=>$solicitud->id_solicitud),array('class'=>'btn btn-social bg-blue','target'=>'_blank'))?>
<?php }?>
<?php foreach($examengab as $ex):?>
    <?php echo CHtml::link("<i class='fa fa-fw fa-file-text'></i>GENERAR ORDEN DE&nbsp;&nbsp;&nbsp;".strtoupper($ex->Serviciogab->examenGabinete->idCatGab->nombre_cat_gab)."",array('SolicitudServicios/reporteOrdengab','id'=>$solicitud->id_solicitud,'ser'=>$ex->Serviciogab->id_servicio),array('class'=>'btn btn-social bg-blue', 'target'=>'_blank'))?>
<?php endforeach;?>
