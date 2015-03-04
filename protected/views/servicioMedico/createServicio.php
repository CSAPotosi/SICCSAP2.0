<div class="col-md-12">
    <div class="box box-primary">
        <?php
        /* @var $this ServicioMedicoController */
        /* @var $model CategoriaServicio */

        $this->breadcrumbs=array(
            'Categoria Servicios'=>array('index'),
            'Nuevo Servicio',
        );


        ?>

        <h3>Crear nuevo servicio</h3>

        <?php $this->renderPartial('_formServicio',array('servicio'=>$servicio,'costoServicio'=>$costoServicio)); ?>
    </div>
</div>