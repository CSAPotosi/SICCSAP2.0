<?php
/* @var $this AuthItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auth Items',
);

$this->menu=array(
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h2>Roles</h2>
            </div>
            <div class="box-body with-border">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#tab_1" data-toggle="tab">ROLES</a></li>
                        <li><a href="#tab_2" data-toggle="tab">TAREAS</a></li>
                        <li><a href="#tab_3" data-toggle="tab">ASIGNACIONES</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3  class="text-center">Roles</h3>
                                </div>
                                <div class="box-body with-border">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <?php if($roles!=null): ?>
                                        <?php $var=0;?>
                                        <?php foreach($roles as $item): ?>
                                            <?php if($var==0) echo "<tr>"; ?>
                                                <td><?php echo CHtml::link("{$item->name}",array('rol/view','id'=>$item->name),array('class'=>'btn btn-block btn-default'));  ?></td>
                                            <?php if($var==3) { echo "</td>"; $var=0;} else $var=$var+1;  ?>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No existen Roles</p>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3  class="text-center">Tareas</h3>
                                </div>
                                <div class="box-body with-border">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <?php if($tareas!=null): ?>
                                        <?php $var=0;?>
                                        <?php foreach($tareas as $item): ?>
                                            <?php if($var==0) echo "<tr>"; ?>
                                            <td><?php echo CHtml::link("{$item->name}",array('rol/view','id'=>$item->name),array('class'=>'btn btn-block btn-default'));  ?></td>
                                            <?php if($var==3) { echo "</td>"; $var=0;} else $var=$var+1;  ?>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No existen Tareas</p>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="text-center">Operaciones</h3>
                                </div>
                                <div class="box-body with-border">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <?php if($operaciones!=null): ?>
                                        <?php $var=0;?>
                                        <?php foreach($operaciones as $item): ?>
                                            <?php if($var==0) echo "<tr>"; ?>
                                            <td><?php echo CHtml::link("{$item->name}",array('rol/view','id'=>$item->name),array('class'=>'btn btn-block btn-default'));  ?></td>
                                            <?php if($var==3) { echo "</td>"; $var=0;} else $var=$var+1;  ?>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No existen Operaciones</p>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>













