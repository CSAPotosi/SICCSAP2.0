<input id="flag" type="hidden" value="1"/>
<?php if(!$modelServicio->isNewRecord):?>
    <input id="flagUpdate" type="hidden" value="1"/>
<?php endif;?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary contenedor">
            <?php $this->renderPartial('_form',array(
                'modelServicio'=>$modelServicio,
                'modelTipoSala'=>$modelTipoSala,
                'modelPrecio'=>$modelPrecio
            )); ?>
        </div>
    </div>
</div>




