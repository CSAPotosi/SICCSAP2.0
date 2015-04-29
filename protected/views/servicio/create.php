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
            <div class="content box">
                <div class="row">
                    <div class="col-lg-4 col-xs-9">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>Laboratorio</h3>
                                <p>Servicios de Laboratorio</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-beaker"></i>
                            </div>
                            <a class="small-box-footer" href="#">
                                <b>Registrar nuevo laboratorio</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-9">
                        <div class="small-box bg-light-blue">
                            <div class="inner">
                                <h3>Ex. de Gabinete</h3>
                                <p>Servicios de Examenes de Gabinete</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-monitor"></i>
                            </div>
                            <a class="small-box-footer" href="#">
                                <b>Nuevo Examen de Gabinete</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-9">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>Atencion Medica</h3>
                                <p>Servicio de Atenciones Medicas</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-stethoscope"></i>
                            </div>
                            <a class="small-box-footer" href="#">
                                <b>Nueva Atencion Medica</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-9">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3>Salas</h3>
                                <p>Servicios de Salas</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bed"></i>
                            </div>
                            <a class="small-box-footer" href="#">
                                <b>Nuevo Servicio de Salas</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-9">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>Servicio Enfermeria</h3>
                                <p>Servicios de Enfermeria</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-thermometer"></i>
                            </div>
                            <a class="small-box-footer" href="#">
                                <b>Nuevo Servicio Clinico</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-9">
                        <div class="small-box bg-maroon">
                            <div class="inner">
                                <h3>Otros Servicios</h3>
                                <p>Otros Servicios Clinicos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-ambulance"></i>
                            </div>
                            <a class="small-box-footer" href="#">
                                <b>Nuevo Servicio Clinico</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content box bg-maroon">
                    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                    <?php $this->renderPartial('_form_precio',array('precio'=>$precio))?>
            </div>
         </div>
    </div>
</div>
