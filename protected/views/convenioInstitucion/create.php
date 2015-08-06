<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            /* @var $this ConvenioInstitucionController */
            /* @var $model ConvenioInstitucion */

            $this->breadcrumbs=array(
		'Convenio Institucions'=>array('index'),
		'Create',
	);

            $this->menu=array(
            array('label'=>'List ConvenioInstitucion', 'url'=>array('index')),
            array('label'=>'Manage ConvenioInstitucion', 'url'=>array('admin')),
            );
            ?>

            <h1>Create ConvenioInstitucion</h1>

            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</div>
