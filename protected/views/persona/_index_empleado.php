<div class="row">
<div class="col-md-offset-2 col-md-8">
    <div class="box box-primary">
        <ul class="nav nav-tabs" id="pesta_persona">
            <li><a href="#persona"  data-toggle="tab">Datos Personales</a></li>
            <li class="active"><a href="#empleado"  data-toggle="tab">Datos Empleado</a></li>
        </ul>
        <div class="tab-content" id="content_persona">
            <div class="tab-pane fade" id="persona">
                <div class="box box-solid">
                    <div class="box-body">
                                <h1>Informacion completada al %50</h1>
                                <div class="progress sm progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        <span class="sr-only">20% complete</span>
                                    </div>
                                </div>
                        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active in" id="empleado">
                <div class="box box-solid">
                    <div class="box-body">
                            <h1>Informacion completada al %50</h1>
                                <div class="progress sm progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        <span class="sr-only">20% complete</span>
                                    </div>
                                </div>
                        <?php $this->renderPartial('_form_empleado', array('empleado'=>$empleado,'lastid'=>$model->id)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>