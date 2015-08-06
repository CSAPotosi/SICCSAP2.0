<?php
    $opciones=[
        0=>['class'=>'danger','title'=>'INACTIVO'],
        1=>['class'=>'primary','title'=>'ACTIVO']
    ];
?>

<dl class="dl-horizontal">
    <dt>
        CODIGO
    </dt>
    <dd>
        <?php echo $tipoSalaModel->servicio->codigo_serv;?>
    </dd>

    <dt>
        NOMBRE
    </dt>
    <dd>
        <?php echo $tipoSalaModel->servicio->nombre_serv;?>
    </dd>

    <dt>
        DESCRIPCION
    </dt>
    <dd style="text-align: justify">
        <?php echo $tipoSalaModel->descripcion_tipo_sala;?>
    </dd>

    <dt>
        COSTO
    </dt>
    <dd>
        <b>Bs.</b> <?php echo $tipoSalaModel->servicio->precioServicio->monto;?>
    </dd>

    <dt>
        ESTADO
    </dt>
    <dd>
        <span class=" label btn-outline label-<?php echo $opciones[$tipoSalaModel->servicio->estado_serv]['class']; ?>"><?php echo $opciones[$tipoSalaModel->servicio->estado_serv]['title'];?></span>
    </dd>
</dl>