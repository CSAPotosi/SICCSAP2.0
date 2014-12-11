<div class="col-md-12">
	<div class="box box-primary">

            <?php
            /* @var $this PersonaController */
            /* @var $model Persona */

            $this->breadcrumbs=array(
                'Personas'=>array('index'),
                'Create',
            );

            ?>
            <h1>Create Persona</h1>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>

</div>