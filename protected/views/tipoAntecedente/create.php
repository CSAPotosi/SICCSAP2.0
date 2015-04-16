<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            /* @var $this TipoAntecedenteController */
            /* @var $model TipoAntecedente */

            $this->breadcrumbs=array(
		'Tipo Antecedentes'=>array('index'),
		'Create',
	);

            $this->menu=array(
            array('label'=>'List TipoAntecedente', 'url'=>array('index')),
            array('label'=>'Manage TipoAntecedente', 'url'=>array('admin')),
            );
            ?>

            <h1>Create TipoAntecedente</h1>

            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</div>
