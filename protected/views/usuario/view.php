<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<div class="row"">
<div class="col-md-12">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="timeline-header"><?php echo $model->getAttributeLabel('nombre').":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".CHtml::link($model->nombre,array('/usuario/view', 'id'=>$model->id_usuario)); ?></h3>
        </div>
        <div class="box-body">
            <i class="fa fa-user bg-aqua"></i>
            <div class="timeline-item">



                    <div class="row">
                        <div class="col-md-2">
                            <?php echo CHtml::image(Yii::app()->baseUrl.'/fotografias/'.$model->persona->fotografia,null,array('class'=>'img-circle img-thumbnail img-responsive '))  ?>
                        </div>
                        <div class="col-md-10">
                            <table class="table table-striped">
                                <tbody>
                                <tr >
                                    <td><b>Nombre Persona:</b></td>
                                    <td><?php echo $model->persona->nombreCompleto;?></td>
                                </tr>
                                <tr >
                                    <td><b><?php echo $model->getAttributeLabel('dni'); ?>:</b></td>
                                    <td><?php echo $model->persona->dni;?></td>
                                </tr>
                                <tr >
                                    <td><b><?php echo $model->persona->getAttributeLabel('direccion'); ?>:</b></td>
                                    <td><?php echo $model->persona->direccion;?></td>
                                </tr>
                                <tr >
                                    <td><b><?php echo $model->persona->getAttributeLabel('telefono'); ?>:</b></td>
                                    <td><?php echo $model->persona->telefono;?></td>
                                </tr>
                                <tr >
                                    <td><b><?php echo $model->getAttributeLabel('estado'); ?>:</b></td>
                                    <td><?php echo ($model->nombre)?"ACTIVO":"INACTIVO";?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3>Roles Asignados</h3>
        </div>
        <div class="box-body">
            <?php foreach($asignaciones as $rol): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" id="nombrepersona" disabled="disabled" class="form-control" value="<?php echo $rol->itemname;?>"/>
                        <span class="input-group-btn">
                          <?php echo CHtml::link("Eliminar",array('usuario/eliminarRol','id'=>$rol->userid,'rol'=>$rol->itemname),array('class'=>'btn btn-danger btn-flat'));  ?>
                        </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <?php echo CHtml::link("Agregar Roles",array('/rol/assign','id'=>$model->id_usuario),array('class'=>'btn btn-info btn-md pull-right')); ?>&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


