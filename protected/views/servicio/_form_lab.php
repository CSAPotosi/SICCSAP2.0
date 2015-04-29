<div class="row">
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
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Servicios Disponibles</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php $this->renderPartial('_form_servicios',array())?>
                </div>
            </div>
            <div class="content box" id="serviprecio">
                <?php

                ?>
            </div>
        </div>
    </div>
</div>
