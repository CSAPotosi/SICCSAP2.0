<?php
$options=[
    1=>['ACTIVO','blue',''],
    2=>['EN USO','green','disabled'],
    3=>['MANTENIMIENTO','yellow',''],
    4=>['INACTIVO','red','disabled']
];
?>

<?php if($listaSalas!=null):?>
    <div class="row">
        <?php foreach($listaSalas as $item):?>
            <div class="col-md-3">
                <div class="info-box bg-<?php echo $options[$item->estado_sala][1];?>">
                    <span class="info-box-icon">
                        <?php echo $item->numero_sala;?>
                    </span>
                    <div class="info-box-content  text-center">
                        <span class="info-box-text"><b>
                            <?php
                                if($item->estado_sala!=2)
                                    echo 'SIN OCUPANTE';
                                else
                                    echo $item->internacionActual->internacion->historial->paciente->personapa->nombreCompleto;
                            ?>
                        </b></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <input type="checkbox"  data-sala="<?php echo $item->id_sala;?>"  <?php echo ($item->estado_sala!=3)?'checked':''; ?> class="changeState" data-toggle="toggle" data-on="ACTIVO" data-off="MANTENIMIENTO" data-onstyle="primary" data-offstyle="warning" <?php echo $options[$item->estado_sala][2];?>>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
<?php else:?>
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>
            <i class="fa fa-warning"></i>
            No se han encontrado salas
        </h4>
        No se han encontrado salas para este tipo, o todas las salas estan inactivas.
    </div>
<?php endif;?>


