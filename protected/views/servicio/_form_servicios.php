<div class="box box-primary collapsed-box box-solid">
    <div class="box-header">
        <h3 class="box-title">Servicios Disponibles</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Laboratorio</h3>
                    <p>Servicios de Laboratorio</p>
                </div>
                <div class="icon">
                    <i class="ion ion-beaker"></i>
                </div>
                <?php echo CHtml::link('<b>Ver detalle</b>',array('Servicio/Crearlab'),array('class'=>'small-box-footer'))?>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3>Gabinete</h3>
                    <p>Servicios de Examenes de Gabinete</p>
                </div>
                <div class="icon">
                    <i class="ion ion-monitor"></i>
                </div>
                <?php echo CHtml::link('<b>Ver detalle</b>',array('Servicio/Creargab'),array('class'=>'small-box-footer'))?>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>At. Medicos</h3>
                    <p>Servicio de Atenciones Medicas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-stethoscope"></i>
                </div>
                <?php echo CHtml::link('<b>Ver detalle</b>',array('/servicio/IndexAtencion'),array('class'=>'small-box-footer'))?>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>Salas</h3>
                    <p>Servicios de Salas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bed"></i>
                </div>
                <?php echo CHtml::link('<b>Ver detalle</b>',array('sala/'),array('class'=>'small-box-footer'))?>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Enfermeria</h3>
                    <p>Servicios de Enfermeria</p>
                </div>
                <div class="icon">
                    <i class="ion ion-thermometer"></i>
                </div>
                <?php echo CHtml::link('<b>Ver detalle</b>',array('Servicio/CrearEnf'),array('class'=>'small-box-footer'))?>
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>Otros Servicios</h3>
                    <p>Otros Servicios Clinicos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-ambulance"></i>
                </div>
                <?php echo CHtml::link('<b>Ver detalle</b>',array('Servicio/CrearSer'),array('class'=>'small-box-footer'))?>
            </div>
        </div>
    </div>
</div>
</div>
