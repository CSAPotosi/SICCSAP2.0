<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/view','id'=>$model->id])." Detalle Paciente";
$this->breadcrumbs=array(
    'Detalle Paciente'=>array('view','id'=>$model->id),
    'Actualizar Paciente',
);
?>
<div class="row">
<div class="col-md-offset-2 col-md-8">
    <div class="box box-primary">

        <ul class="nav nav-tabs" id="pesta_persona">
            <li><a href="#persona"  data-toggle="tab">Datos Personales</a></li>
            <li class="active"><a href="#paciente"  data-toggle="tab">Datos Paciente</a></li>
        </ul>
        <div class="tab-content" id="content_persona">
            <div class="tab-pane fade" id="persona">
                <div class="box box-solid"></div>
                    <div class="box-body">
                            <h1>Informacion completada al %100</h1>
                            <div class="progress sm progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    <span class="sr-only">100% complete</span>
                                </div>
                            </div>
                        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                    </div>
                </div>

            <div class="tab-pane fade active in" id="paciente">
                <div class="box box-solid">
                    <div class="box-body">
                            <h1>Informacion completada al %100</h1>
                                <div class="progress sm progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        <span class="sr-only">100% complete</span>
                                    </div>
                                </div>
                        <?php $this->renderPartial('_form_paciente', array('paciente'=>$paciente,'model'=>$model,'lastid'=>$model->id,'contacto'=>$contacto)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>