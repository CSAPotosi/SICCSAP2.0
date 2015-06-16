<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">

            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3>Especialidades Disponibles</h3>
                    <div class="input-group margin">
                        <input class="form-control" type="text" id="buscasolser" placeholder="Item de Examen de gabinete">
                            <span class="input-group-btn">
                                <button class="btn bg-red-gradient" type="button"><i class="fa fa-fw fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <div class="box-body" id="contenedor_especialidad">
                    <?php $this->renderPartial('/medico/_form_especialidades',array('especialidad'=>$listaespecialidades))?>
                </div>
                <div class="box-footer">
                    <button class="btn bg-red-gradient" data-target="#especialidad" data-toggle="modal">Agregar Especialidad</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="especialidad" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Especialidades</h4>
            </div>
            <div class="modal-body" id="contenedorformespecialidad">
                <?php $this->renderPartial('/medico/especialidad_formulario',array('especialidad'=>new Especialidad))?>
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnespecialidad','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Registrar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseUpdTipoSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cancelar',true)?>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('controlsolicitudserviciosd','
    $("#btnespecialidad").on("click",CrearEspecialidad);
    function CrearEspecialidad(){
        $.ajax({
                url:"'.CHtml::normalizeUrl(array('Medico/CrearEspecialidad')).'",
                data:$("#especialidad-form").serialize(),
                type:"post",
                success:function(datos){
                    $("#contenedor_especialidad").html(datos);
                }
        });
    }
');