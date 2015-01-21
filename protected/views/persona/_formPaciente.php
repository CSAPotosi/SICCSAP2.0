<div class="col-md-12">
    <div class="box box-primary" >
        <div class="box-header">
            <h2 class="box-title">Paciente</h2>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form" id="formpaciente">
                <div class="box-body">

                    <p class="note">Fields with <span class="required">*</span> are required.</p>
                    <?php echo CHtml::errorSummary($modelH,null,null,array('class'=>'alert alert-error')); ?>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'id',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'id',array('class'=>'form-control','placeholder'=>'id')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'id',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'ocupacion_paciente',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'ocupacion_paciente',array('class'=>'form-control','placeholder'=>'ocupacion_paciente')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'ocupacion_paciente',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'grupo_sanguineo_paciente',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'grupo_sanguineo_paciente',array('class'=>'form-control','placeholder'=>'grupo_sanguineo_paciente')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'grupo_sanguineo_paciente',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'tipo_paciente',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'tipo_paciente',array('class'=>'form-control','placeholder'=>'tipo_paciente')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'tipo_paciente',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'fecha_muerte',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'fecha_muerte',array('class'=>'form-control','placeholder'=>'fecha_muerte')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'fecha_muerte',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'fecha_creacion',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'fecha_creacion',array('class'=>'form-control','placeholder'=>'fecha_creacion')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'fecha_creacion',array('class'=>'label label-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::activelabelEx($modelH,'fecha_actualizacion',array('class'=>'col-md-2 control-label')); ?>
                        <div class="col-sm-8">
                            <?php echo CHtml::activetextField($modelH,'fecha_actualizacion',array('class'=>'form-control','placeholder'=>'fecha_actualizacion')); ?>
                        </div>
                        <?php echo CHtml::error($modelH,'fecha_actualizacion',array('class'=>'label label-danger')); ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>