<div class="col-md-12">
    <div class="box box-primary">
        <?php
        $this->breadcrumbs=array(
            'Horarios'=>array('index'),
            'Create',
        );

        $this->menu=array(
            array('label'=>'List Horario', 'url'=>array('index')),
            array('label'=>'Manage Horario', 'url'=>array('admin')),
        );
        ?>

        <center><h1>Crear Horario</h1></center>

        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>
