<div class="col-md-12">
    <div class="box box-primary" id="caja1">
        <div class="box-header">
            <h2 class="box-title">Medico</h2>

            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form" id="formmedico">
                <center><p class="note">Los campos con <span class="required">*</span> son obligatorios</p></center>
                <?php echo CHtml::errorSummary($modelM,null,null,array('class'=>'alert alert-error')); ?>
                <div class="form-group">
                    <?php echo CHtml::activelabelEx($modelM,'id',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo CHtml::activetextField($modelM,'id',array('class'=>'form-control','placeholder'=>'id')); ?>
                    </div>
                    <?php echo CHtml::error($modelM,'id',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::activelabelEx($modelM,'matricula',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo CHtml::activetextField($modelM,'matricula',array('class'=>'form-control','placeholder'=>'matricula')); ?>
                    </div>
                    <?php echo CHtml::error($modelM,'matricula',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::activelabelEx($modelM,'colegiatura',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo CHtml::activetextField($modelM,'colegiatura',array('class'=>'form-control','placeholder'=>'colegiatura')); ?>
                    </div>
                    <?php echo CHtml::error($modelM,'colegiatura',array('class'=>'label label-danger')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::activelabelEx($modelM,'estado',array('class'=>'col-md-2 control-label')); ?>
                    <div class="col-sm-8">
                        <?php echo CHtml::activetextField($modelM,'estado',array('class'=>'form-control','placeholder'=>'estado')); ?>
                    </div>
                    <?php echo CHtml::error($modelM,'estado',array('class'=>'label label-danger')); ?>
                </div>
                <div class="col-sm-4">
                    <a href="#" id="addEspecialidad" class="col-sm-offset-2" >Nueva especialidad</a>
                </div>
                <br>
                <div id="especialidad" class="form-group">
                    <div class="col-sm-1" id="la">
                        <?php foreach($items as $item): ?>
                            <div id="la">
                                <?php echo CHtml::activedropDownList($item,'[]id_especialidad',CHtml::listData( Especialidad::model()->findAll(),'id_especialidad','nombre_especialidad')
                                ); ?></div>
                            <?php echo CHtml::error($item,'[]id_especialidad'); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar una Especialidad</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#addEspecialidad").click(function(e){
            e.preventDefault();
            var label='<?php echo CHtml::activelabelEx(MedicoEspecialidad::model(),"Nombre"); ?>';
            var lista='<?php echo str_replace("\n","",CHtml::activedropDownList(MedicoEspecialidad::model(),"[]id_especialidad",
                                CHtml::listData( Especialidad::model()->findAll(),"id_especialidad","nombre_especialidad"))); ?>';
            $("#especialidad").append(label);
            $("#especialidad").append(lista);
        });
    });

</script>