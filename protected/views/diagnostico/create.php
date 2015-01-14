<div class="col-md-12">
	<div class="box box-primary">
	<?php
	/* @var $this DiagnosticoController */
	/* @var $model Diagnostico */

	$this->breadcrumbs=array(
		'Diagnosticos'=>array('index'),
		'Create',
	);

	$this->menu=array(
		array('label'=>'List Diagnostico', 'url'=>array('index')),
		array('label'=>'Manage Diagnostico', 'url'=>array('admin')),
	);
	?>
    <ul id="tabsDiagnostico" class="nav nav-tabs" role="tab-panel">
       <li role="presentation" ><a href="#antecedentes" id="antecedente-tab" role="tab" data-toggle="tab" aria-controls="antecedente" aria-expanded="false">Antecedentes</a></li>
       <li role="presentation" class="active"><a href="#diagnostico" id="diagnostico-tab" role="tab" data-toggle="tab" aria-controls="diagnostico" aria-expanded="false">Diagnostico</a></li>
       <li role="presentation"><a href="#receta" id="receta-tab" role="tab" data-toggle="tab" aria-controls="receta" aria-expanded="false">Receta</a></li>
        <li role="presentation"><a href="#reconsulta" id="reconsulta-tab" role="tab" data-toggle="tab" aria-controls="reconsulta" aria-expanded="false">Reconsulta</a></li>
    </ul>
    <div id="tabcontent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="antecedentes" aria-labelledby="antecedentes-tab">
        </div>
        <div role="tabpanel" class="tab-pane fade active in" id="diagnostico" aria-labelledby="diagnostico-tab">
            <h1>Diagnostico medico</h1>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
        <div role="tabpanel" class="tab-pane fade active in" id="receta" aria-labelledby="receta-tab">
        </div>
        <div role="tabpanel" class="tab-pane fade active in" id="reconsulta" aria-labelledby="reconsulta-tab">
        </div>
    </div>
    </div>
</div>