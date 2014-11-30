<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
                View Horario #<?php echo $model->id_horario; ?>
            </h3>
        </div>
        <?php
        $this->breadcrumbs=array(
            'Horarios'=>array('index'),
            $model->id_horario,
        );

        $this->menu=array(
            array('label'=>'List Horario', 'url'=>array('index')),
            array('label'=>'Create Horario', 'url'=>array('create')),
            array('label'=>'Update Horario', 'url'=>array('update', 'id'=>$model->id_horario)),
            array('label'=>'Delete Horario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_horario),'confirm'=>'Are you sure you want to delete this item?')),
            array('label'=>'Manage Horario', 'url'=>array('admin')),
        );
        ?>

        <div class="box-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
                    'id_horario',
                    'nombre_horario',
                    'tipo_horario',
                    'estado',
                ),
            )); ?>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Turnos disponibles</h3>
            <div class="box-tools">
                <div class="input-group">
                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
                </tbody></table>
        </div>
        <div class="box-footer">

        </div>
    </div>
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ...
            </div>
        </div>
    </div>
</div>
