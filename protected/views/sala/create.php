<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php
            /* @var $this SalaController */
            /* @var $model TipoSala */

            $this->breadcrumbs=array(
                'Tipo Salas'=>array('index'),
                'Create',
            );

            $this->menu=array(
                array('label'=>'List TipoSala', 'url'=>array('index')),
                array('label'=>'Manage TipoSala', 'url'=>array('admin')),
            );
            ?>

            <h1>Create TipoSala</h1>

            <?php $this->renderPartial('_form', array('model'=>$model,'modelCosto'=>$modelCosto)); ?>	</div>
    </div>
</div>

