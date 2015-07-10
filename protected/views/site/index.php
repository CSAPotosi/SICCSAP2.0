<?php
    $this->pageTitle="Pacientes internados";
?>
<?php foreach($listaTipoSala as $itemTipo):?>

<div class="row">
    <?php foreach($itemTipo->salas as $itemSala):?>
        <?php if($itemSala->internacionActual!=null):?>
        <div class="col-md-3">
            <div class="info-box bg-red">
                <span class="info-box-icon "><?php echo $itemSala->numero_sala;?></span>
                <div class="info-box-content">
                    <span class="info-box-number"><?php echo $itemSala->internacionActual->internacion->historial->paciente->personapa->nombreCompleto;?></span>
                    <span class="info-box-text"><?php echo $itemTipo->servicio->nombre_serv;?></span>
                </div>
            </div>
        </div>
        <?php endif;?>
    <?php endforeach;?>
</div>

<?php endforeach; ?>