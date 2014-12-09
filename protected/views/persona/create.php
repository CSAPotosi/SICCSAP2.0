<div class="col-md-12">
	<div class="box box-primary">
            <?php
            /* @var $this PersonaController */
            /* @var $model Persona */

            $this->breadcrumbs=array(
                'Personas'=>array('index'),
                'Create',
            );

            $this->menu=array(
                array('label'=>'List Persona', 'url'=>array('index')),
                array('label'=>'Manage Persona', 'url'=>array('admin')),
            );
            ?>
            <h1>Create Persona</h1>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg'));?>
            </div>
    </div>

</div>