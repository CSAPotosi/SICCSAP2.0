<?php $this->renderPartial('/layouts/_cabeceraReporte',['modelH'=>$modeloDetalle->idSolicitud->idHistorial,'titulo'=>"RESULTADOS DE LABORATORIO<br/>{$modeloDetalle->servicio->nombre_serv}"]);?>

<?php
$this->renderPartial('/laboratorio/_detalleExamenLaboratorio',['modeloDetalle'=>$modeloDetalle]);
?>

<?php $this->renderPartial('/layouts/_pieReporte');?>
