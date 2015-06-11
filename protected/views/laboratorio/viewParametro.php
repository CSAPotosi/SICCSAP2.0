<?php
    $this->pageTitle='Detalle de parametro';

    $options=[
        0=>['Ambos sexos'],
        1=>['Masculino'],
        2=>['Femenino']
    ];
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Datos del parametro</h3>
                <div class="box-tools">
                    <?php echo CHtml::link('Editar parametro',['updateParametro','id_par'=>$modelParametro->id_par_lab],['class'=>'btn btn-primary pull-right'  ,'style'=>'color:#fff'])?>
                </div>
            </div>
            <div class="box-body">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$modelParametro,
                    'attributes'=>array(
                        'nombre_par_lab',
                        'unidad_par_lab',
                        'estado_par_lab',
                    ),
                )); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rangos asignados</h3>
                <div class="box-tools">
                    <?php echo CHtml::link('Nuevo rango',['createRango','id_par'=>$modelParametro->id_par_lab],['class'=>'btn btn-primary pull-right'  ,'style'=>'color:#fff'])?>
                </div>
            </div>
            <div class="box-body">
                <?php if($modelParametro->rangosParametros!=null):?>
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Val. Min.</th>
                                <th>Val. Max</th>
                                <th>Sexo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($modelParametro->rangosParametros as $itemRango):?>
                                <tr>
                                    <td><?php echo $itemRango->valor_min;?></td>
                                    <td><?php echo $itemRango->valor_max;?></td>
                                    <td><?php echo $options[$itemRango->sexo_rango][0];?></td>
                                    <td class="text-center">
                                        <?php echo CHtml::link('<i class="fa fa-edit"></i>',['updateRango','id_rango'=>$itemRango->id_rango],['title'=>'Editar rango']);?>
                                        <?php echo CHtml::link('<i class="fa fa-trash-o"></i>',['deleteRango','id_rango'=>$itemRango->id_rango],['title'=>'Eliminar rango']);?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                <?php else: ?>
                    No se han asignado rangos a este parametro
                <?php endif;?>
            </div>
        </div>
    </div>
</div>