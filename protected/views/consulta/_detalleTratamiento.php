<?php if($modelTratamiento!=null):?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-success collapsed-box">
            <div class="box-header">
                <h3 class="box-title">Tratamiento <small class="label label-green"><?php echo date('d-m-Y H:i',strtotime($modelTratamiento->fecha_trat));?></small></h3>
                <div class="box-tools pull-right" id="tools-trat">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>INSTRUCCIONES:</dt>
                    <dd><?php echo $modelTratamiento->instrucciones_trat;?></dd>
                    <dt>OBSERVACIONES:</dt>
                    <dd><?php echo $modelTratamiento->observaciones_trat;?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<?php if($modelTratamiento->recetas!=null):?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-success collapsed-box">
            <div class="box-header">
                <h3 class="box-title">Recetas</h3>
                <div class="box-tools pull-right" id="tools-receta">
                    <?php echo CHtml::link('<i class="fa fa-print"></i>',['reportes/receta','id_trat'=>$modelTratamiento->id_trat],['class'=>'btn btn-box-tool','target'=>'_blanck']);?>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>MEDICAMENTO</th>
                            <th>CANTIDAD SOLICITADA</th>
                            <th>VIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($modelTratamiento->recetas as $itemR):?>
                            <tr>
                                <td><?php echo $itemR->medicamento->descripcion; ?></td>
                                <td><?php echo $itemR->cant_solicitada; ?></td>
                                <td><?php echo $itemR->via;?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php endif;?>

<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::button('Agregar evolucion',['class'=>'btn btn-primary btn-block','id'=>'btnModalCreateEvolucion','data-toggle'=>'modal','data-target'=>'#modalFormEvolucion','data-id_trat'=>$modelTratamiento->id_trat])?>
        <ul class="products-list product-list-in-box">
            <?php foreach($modelTratamiento->evolucions as $itemE):?>
            <li class="item">
                <div class="product-info">
                    <div class="product-title"><?php echo $itemE->estado_paciente;?><span class="label label-primary pull-right"><?php echo date('d-m-Y H:i',strtotime($itemE->fecha_evo));?></span></div>
                        <?php if($itemE->exploracion_evo):?>
                            <span class="product-description">
                              <b>EXPLORACION: </b><?php echo $itemE->exploracion_evo;?>
                            </span>
                        <?php endif;?>
                        <?php if($itemE->exploracion_evo):?>
                            <span class="product-description">
                              <b>RECOMENDACIONES: </b><?php echo $itemE->recomendaciones_evo;?>
                            </span>
                        <?php endif;?>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<?php else: ?>
    Seleccione tratamiento
<?php endif;?>