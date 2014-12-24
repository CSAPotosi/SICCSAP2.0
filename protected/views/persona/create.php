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
            <center><h1>Crear Persona</h1></center>
            <?php $this->renderPartial('_form', array('model'=>$model,'modelM'=>$modelM,'items'=>$items,'modelE'=>$modelE)); ?>
            <?php $this->renderPartial('_formEspecialidad', array('modelE'=>$modelE)); ?>

    </div>

</div>