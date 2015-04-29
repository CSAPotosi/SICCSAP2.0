<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            /* @var $this ServicioController */
            /* @var $model Servicio */

            $this->breadcrumbs=array(
		'Servicios'=>array('index'),
		'Create',
	);

            $this->menu=array(
            array('label'=>'List Servicio', 'url'=>array('index')),
            array('label'=>'Manage Servicio', 'url'=>array('admin')),
            );
            ?>
            <div class="servicios" id="servicios">
                <?php $this->renderPartial('_form_servicios',array())?>
            </div>

            <div class="content box" id="serviprecio">

            </div>
         </div>
    </div>
</div>
