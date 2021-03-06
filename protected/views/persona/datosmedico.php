<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <?php
        $this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/Medicos'])."Medicos";
        $this->breadcrumbs=array(
            'Medicos'=>array('Medicos'),
            'Nuevo Medico',
        );
        ?>
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Registro de Datos Personales de Medico
                    </div>
                    <div class="box-body">
                        <h1>Informacion completada al %0</h1>
                        <div class="progress sm progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                                <span class="sr-only">20% complete</span>
                            </div>
                        </div>
                        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                    </div>
                </div>
    </div>
</div>