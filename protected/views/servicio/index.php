<div class="row">
    <div class="col-md-12">

        <?php
        /* @var $this ServicioController */
        /* @var $dataProvider CActiveDataProvider */
        $this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['site/index'])." Pagina de Inicio";
        $this->breadcrumbs=array(
		'Servicios',
	);

        ?>
      <?php $this->renderPartial('_form_servicios',array())?>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Servicios</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

            </div>
        </div>
    </div>
</div>
