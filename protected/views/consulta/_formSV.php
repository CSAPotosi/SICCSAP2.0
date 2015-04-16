<h5 class="page-header">
    Signos vitales
</h5>

<div class="row">
    <?php $index =0; ?>
    <?php foreach($listaSV as $itemSV):?>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo CHtml::activeLabel($itemSV,$itemSV->SignosVitales->nombre_sv);?>
                <div class="input-group">
                    <?php echo CHtml::activeHiddenField($itemSV,"[$index]id_sv");?>
                    <?php echo CHtml::activeTextField($itemSV,"[$index]valor",array('class'=>'form-control'));?>
                    <span class="input-group-addon"><?php echo $itemSV->SignosVitales->unidad_sv;?></span>
                </div>

            </div>
        </div>

    <?php $index++; endforeach; ?>
</div>




