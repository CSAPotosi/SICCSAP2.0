<h5 class="page-header">
    Signos vitales
</h5>
<div class="row">
    <?php
    $sv=SignosVitales::model()->findAll();
    $i=0;
    for($i=0;$i<count($sv)&&$i<6;$i++):
        ?>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo CHtml::label($sv[$i]->nombre_sv,"nuevoConsultaSignosVitales[$i][valor]");?>
                <div class="input-group">
                    <?php echo CHtml::activeHiddenField($SVModelList[$i],"[$i]id_sv",array('value'=>$sv[$i]->id_sv));?>
                    <?php echo CHtml::activeTextField($SVModelList[$i],"[$i]valor",array('class'=>'form-control'));?>
                    <span class="input-group-addon"><?php echo $sv[$i]->unidad_sv;?></span>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<?php if (count($sv)>6):?>
    <a class="btn btn-primary pull-right" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Mas...
    </a>
    <div class="collapse" id="collapseExample">
        <div class="row">
            <?php for($i=6;$i<count($sv);$i++):?>
                <div class="col-md-2">
                    <div class="form-group">
                        <?php echo CHtml::label($sv[$i]->nombre_sv,"nuevoConsultaSignosVitales[$i][valor]");?>
                        <div class="input-group">
                            <?php echo CHtml::activeHiddenField($SVModelList[$i],"[$i]id_sv",array('value'=>$sv[$i]->id_sv));?>
                            <?php echo CHtml::activeTextField($SVModelList[$i],"[$i]valor",array('class'=>'form-control'));?>
                            <span class="input-group-addon"><?php echo $sv[$i]->unidad_sv;?></span>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <a href="#" class="btn btn-primary pull-right">Agregar nuevo</a>
    </div>
<?php else: ?>
    <a href="#" class="btn btn-primary pull-right">Agregar nuevo</a>
<?php endif; ?>
