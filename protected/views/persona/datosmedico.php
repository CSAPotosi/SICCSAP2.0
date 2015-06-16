<div class="row">
    <div class="col-md-12">
        <?php
        /* @var $this PersonaController */
        /* @var $model Persona */
        $this->breadcrumbs=array(
            'Personas'=>array('index'),
            'Nueva Persona',
        );
        ?>
        <ul class="nav nav-tabs" id="padre">
            <li class="active"><a href="#persona"  data-toggle="tab">Datos Personales</a></li>
        </ul>
        <div class="tab-content" >
            <div class="tab-pane fade active in" id="persona">
                <div class="box box-solid">
                    <div class="box-header">
                        <h1>Informacion completada al %0</h1>
                        <div class="progress sm progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                                <span class="sr-only">20% complete</span>
                            </div>
                        </div>
                    </div>
                    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                </div>
            </div>
        </div>
    </div>
</div>