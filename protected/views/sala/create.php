<input id="flag" type="hidden" value="1"/>
<?php if(!$modelServicio->isNewRecord):?>
    <input id="flagUpdate" type="hidden" value="1"/>
<?php endif;?>

<?php $this->renderPartial('_form',array(
    'modelServicio'=>$modelServicio,
    'modelTipoSala'=>$modelTipoSala,
    'modelPrecio'=>$modelPrecio
)); ?>





