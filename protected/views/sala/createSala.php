<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            /* @var $this SalaController */
            /* @var $model TipoSala */

            $this->breadcrumbs=array(
                'Tipo Salas'=>array('index'),
                'Crear Nueva Sala',
            );
            ?>

            <h1>Crear Nueva Sala</h1>

            <?php $this->renderPartial('_formSala', array('itemSala'=>$itemSala)); ?>
        </div>
    </div>
</div>

