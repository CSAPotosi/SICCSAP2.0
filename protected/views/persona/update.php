<div class="col-md-12">
	<div class="box box-primary">
		<?php
		/* @var $this PersonaController */
		/* @var $model Persona */

		$this->breadcrumbs=array(
			'Personas'=>array('index'),
			$model->id=>array('view','id'=>$model->id),
			'Update',
		);

		$this->menu=array(
			array('label'=>'List Persona', 'url'=>array('index')),
			array('label'=>'Create Persona', 'url'=>array('create')),
			array('label'=>'View Persona', 'url'=>array('view', 'id'=>$model->id)),
			array('label'=>'Manage Persona', 'url'=>array('admin')),
		);
		?>
        <ul class="nav nav-tabs" id="pesta_persona">

            <li><a href="#persona"  data-toggle="tab">Datos Personales</a></li>
            <li class="active"><a href="#paciente"  data-toggle="tab">Datos Complementarios</a></li>
        </ul>
        <div class="tab-content" id="content_persona">
            <div class="tab-pane fade" id="persona">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Informacion completada al %50</h1>
                            </div>
                            <div class="col-sm-12">
                                <div class="progress sm progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        <span class="sr-only">20% complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active in" id="paciente">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Informacion completada al %50</h1>
                            </div>
                            <div class="col-sm-12">
                                <div class="progress sm progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        <span class="sr-only">20% complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $this->renderPartial('_form_paciente', array('paciente'=>$paciente,'model'=>$model,'lastid'=>$model->id,'contacto'=>$contacto)); ?>
                    </div>
                </div>
            </div>
        </div>
</div>