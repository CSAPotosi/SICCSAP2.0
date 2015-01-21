
<div class="col-md-12">
    <div class="box box-primary" id="caja3">
        <div class="box-header">
            <h2 class="box-title">Empleado</h2>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
<div class="form" id="formempleado">
<h3>Empleado</h3>

<div class="form-group">
    <?php echo CHtml::activeLabelEx($empleado,'fecha_contratacion',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeTextField($empleado,'fecha_contratacion',array('class'=>'form-control','placeholder'=>'Fecha Contratacion')); ?>
    </div>
    <?php echo CHtml::error($empleado,'fecha_contratacion',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabelEx($empleado,'profesion',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeTextField($empleado,'profesion',array('class'=>'form-control','placeholder'=>'Profesion')); ?>
    </div>
    <?php echo CHtml::error($empleado,'profesion',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabelEx($empleado,'estado',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeDropDownList($empleado,'estado', array("ACTIVO"=>"ACTIVO","INACTIVO"=>"INACTIVO"), array('class'=>'form-control','placeholder'=>'Estado', 'empty' => '--Selecciona--')); ?>
    </div>
    <?php echo CHtml::error($empleado,'estado',array('class'=>'label label-danger')); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabelEx($asignacion_empleado,'id_cargo',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeDropDownList($asignacion_empleado,'id_cargo', CHtml::listData(Cargo::model()->findAll(), 'id_cargo', 'nombre_cargo'), array('class'=>'form-control','placeholder'=>'Estado', 'empty' => '--Selecciona--')); ?>
    </div>
    <?php echo CHtml::error($asignacion_empleado,'id_cargo',array('class'=>'label label-danger')); ?>
</div>


<div class="form-group">
    <?php echo CHtml::activeLabelEx($asignacion_empleado,'id_horario',array('class'=>'col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeDropDownList($asignacion_empleado,'id_horario', CHtml::listData(Horario::model()->findAll(), 'id_horario', 'nombre_horario'), array('class'=>'form-control','placeholder'=>'Estado', 'empty' => '--Selecciona--')); ?>
    </div>
    <?php echo CHtml::error($asignacion_empleado,'id_horario',array('class'=>'label label-danger')); ?>
</div>

</div>
</div>
</div>
