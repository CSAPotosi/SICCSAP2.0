<?php
    $options=[
        1=>['ACTIVO','blue',''],
        2=>['EN USO','green','disabled'],
        3=>['MANTENIMIENTO','yellow','disabled'],
        4=>['INACTIVO','red','']
    ];
?>


<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">SALAS <?php echo $modelTipoSala->servicio->nombre_serv;?></h3>
                <div class="box-tools pull-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <?php echo CHtml::label('Tipo de Sala: ','tipoSala');?>
                            <?php echo CHtml::dropDownList('tipoSala',$modelTipoSala->id_tipo_sala,CHtml::listData(TipoSala::model()->findAll(),'id_tipo_sala','servicio.nombre_serv'),['class'=>'form-control input-sm']);?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php foreach($listaSalas as $itemSala):?>
                        <div class="col-md-3">
                            <div class="small-box bg-<?php echo $options[$itemSala->estado_sala][1].' '.$options[$itemSala->estado_sala][2];?>">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-md-6"><h3><?php echo $itemSala->numero_sala;?></h3></div>
                                        <div class="col-md-6 check">
                                            <input type="hidden" class="id_sala" value="<?php echo $itemSala->id_sala;?>" data-sala="<?php echo $itemSala->numero_sala;?>" data-tipo="Sala <?php echo $itemSala->tipoSala->servicio->nombre_serv;?>"/>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="small-box-footer"><?php echo ($itemSala->internacionActual!=null)?$itemSala->internacionActual->internacion->historial->paciente->personapa->nombreCompleto:$options[$itemSala->estado_sala][0];?></a>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <div class="col-md-3">
                        <div class="small-box bg-maroon-gradient">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-md-6"><h3><i class="fa fa-times"></i></h3></div>
                                    <div class="col-md-6 check">
                                        <input type="hidden" class="id_sala" value="0" data-sala="" data-tipo="Sala"/>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="small-box-footer">Sin Sala</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>