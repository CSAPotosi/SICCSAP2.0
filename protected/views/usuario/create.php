<div class="row">
    <div class="col-md-10 col-md-offset-1">

        <?php
        $this->breadcrumbs=array(
            'Usuarios'=>array('index'),
            'Create',
        );

        $this->menu=array(
            array('label'=>'List Usuario', 'url'=>array('index')),
            array('label'=>'Manage Usuario', 'url'=>array('admin')),
        );
        ?>

        <h1>Crear Usuario</h1>
        <div class="box box-primary">
            <div class="box-header"><h2>Usuarios</h2></div>
            <div class="box-body">
                    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
            </div>
        </div>
        <?php if(Yii::app()->authManager->checkAccess('editar_usuario',3))
        {
        echo "yes";
        }else echo "no";
?>
    </div>
</div>


