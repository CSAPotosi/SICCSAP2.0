<?php
$opciones=[
    1=>['bg'=>'blue','title'=>'ACTIVO'],
    2=>['bg'=>'green','title'=>'EN USO'],
    3=>['bg'=>'yellow','title'=>'MANTENIMIENTO'],
    4=>['bg'=>'red','title'=>'INACTIVO']
];
?>

<dl class="dl-horizontal">
    <dt>
        NUMERO
    </dt>
    <dd>
        <?php echo $salaModel->numero_sala;?>
    </dd>

    <dt>
        UBICACION
    </dt>
    <dd>
        <?php echo $salaModel->ubicacion_sala;?>
    </dd>

    <dt>
        ESTADO
    </dt>
    <dd>
        <span class=" label btn-outline bg-<?php echo $opciones[$salaModel->estado_sala]['bg']; ?>"><?php echo $opciones[$salaModel->estado_sala]['title'];?></span>
    </dd>

    <?php if($salaModel->estado_sala==2):?>
        <dt>
            PACIENTE
        </dt>
        <dd>
            <?php echo $salaModel->internacionActual->internacion->historial->paciente->personapa->nombreCompleto;?>
        </dd>
    <?php endif;?>
</dl>