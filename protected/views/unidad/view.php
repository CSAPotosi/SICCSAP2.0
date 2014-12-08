
<?php
/* @var $this UnidadController */
/* @var $model Unidad */



$this->breadcrumbs=array(
	'Unidads'=>array('index'),
	$model->id_unidad,
);

$this->menu=array(
	array('label'=>'List Unidad', 'url'=>array('index')),
	array('label'=>'Create Unidad', 'url'=>array('create')),
	array('label'=>'Update Unidad', 'url'=>array('update', 'id'=>$model->id_unidad)),
	array('label'=>'Delete Unidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_unidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Unidad', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
				View Unidad #<?php echo $model->id_unidad; ?>            </h3>
        </div>
		<div class="box-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_unidad',
		'nombre_unidad',
		'descripcion_unidad',
		'estado',
	),
)); ?>

            <h3>Cargos de la unidad</h3>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$dataProvider,
            ));?>

            <?php echo CHtml::link('Añadir Nuevo Cargo',array('cargo/create')); ?>

            <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Compose Message</a>
</div>
</div>

    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">TO:</span>
                                <input name="email_to" type="email" class="form-control" placeholder="Email TO">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">CC:</span>
                                <input name="email_to" type="email" class="form-control" placeholder="Email CC">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">BCC:</span>
                                <input name="email_to" type="email" class="form-control" placeholder="Email BCC">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="btn btn-success btn-file">
                                <i class="fa fa-paperclip"></i> Attachment
                                <input type="file" name="attachment"/>
                            </div>
                            <p class="help-block">Max. 32MB</p>
                        </div>

                    </div>
                    <div class="modal-footer clearfix">

                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>

                        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->