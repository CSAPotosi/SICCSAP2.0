<?php
Yii::app()->clientScript->registerScript('search','
    function getusuarios(id){
        $("#idusuario").prop("value",id);
        $("#nombreusuario").prop("value",$("#usuarios-grid tr.selected>td").eq(1).text());
    };
');

?>

<div class="row"">
    <div class="col-md-12">

        <?php
        /* @var $this AuthItemController */
        /* @var $model AuthItem */

        $this->breadcrumbs=array(
            'Auth Items'=>array('index'),
            'Create',
        );

        $this->menu=array(
            array('label'=>'List AuthItem', 'url'=>array('index')),
            array('label'=>'Manage AuthItem', 'url'=>array('admin')),
        );
        ?>
        <div class="box box-primary">
            <div class="box-header">
                <h2>Asignar Roles</h2>
            </div>
            <div class="box-body">
                <div class="form">
                    <?php echo CHtml::beginForm(); ?>

                    <div class="form-group">

                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'usuarios-grid',
                            'dataProvider'=>$usuarios->search(),
                            'filter'=>$usuarios,
                            'itemsCssClass' => 'table table-bordered table-striped dataTable',
                            'columns'=>array(
                                'id_usuario',
                                'nombre',
                            ),
                            'selectionChanged'=>'function(id){getusuarios($.fn.yiiGridView.getSelection(id))}',
                        )); ?>
                        <input type="hidden" name="idusuario" id="idusuario" />
                        <label> Nombre Usuario</label>
                        <input type="text" class="form-control" id="nombreusuario" />
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary box-solid">
                                    <div class="box-header"><h4> Seleccionar Roles</h4></div>
                                    <div class="box-body">
                                        <?php foreach($items as $i=>$item): ?>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="roles[]" value=<?php echo $item->name;?> /><?php echo $item->name;?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="box-footer">
                        <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-primary btn-lg')); ?>
                    </div>
                    <?php echo CHtml::endForm(); ?>
                </div><!-- form -->
            </div>
        </div>
    </div>
</div>
