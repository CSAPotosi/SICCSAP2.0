<?php
Yii::app()->clientScript->registerScript('search','
    $("#usuarios-grid").hide();
    function getusuarios(id){
        $("#idusuario").prop("value",id);
        $("#nombreusuario").prop("value",$("#usuarios-grid tr.selected>td").eq(1).text());
        $("#usuarios-grid").slideToggle(400);
    };
    $("#nombreusuario").on("click",function(){
        $("#usuarios-grid").slideToggle(400);
        $(this).prop("maxlength","0");
        $(this).prop("placeholder","Escoger un usuario de la siguiente tabla:");
    });
    $("#botonusuario").on("click",function(){

    });
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
                        <input type="hidden" name="idusuario" id="idusuario" />
                        <label> Nombre Usuario</label>
                        <div class="input-group input-group-sm">
                            <input type="text" id="nombreusuario" class="form-control"/>
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="button" id="botonpersona"><i class="fa fa-fw fa-user-plus"></i></button>
                            </span>
                        </div>
                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'usuarios-grid',
                            'dataProvider'=>$usuarios->search(),
                            'itemsCssClass' => 'table table-bordered table-striped dataTable',
                            'columns'=>array(
                                'id_usuario',
                                'nombre',
                            ),
                            'selectionChanged'=>'function(id){getusuarios($.fn.yiiGridView.getSelection(id))}',
                        )); ?>

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
