<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Datos del paciente</h3>
            </div>
            <div class="box-body">
                hola mundo
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Historial de Consultas Realizadas</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control pull-left input-sm" id="rangoFecha"/>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">

                <?php echo CHtml::link('Nueva Consulta',array('consulta/','hid'=>$historiaModel->id),array('class'=>'btn btn-primary pull-right'));?>

                <?php $this->widget('zii.widgets.grid.CGridView',array(
                    'id'=>'tablaConsulta',
                    'dataProvider'=>$listaConsulta,
                    'template'=>'{items}',
                    'itemsCssClass'=>'table table-hover table-bordered dataTable',
                    'columns'=>array(
                        array(
                            'name'=>'Fecha',
                            'value'=>'date("d/m/Y",strtotime($data->fecha_diagnostico))'
                        ),
                        array(
                            'name'=>'Hora',
                            'value'=>'date("h:i A",strtotime($data->fecha_diagnostico))'
                        ),
                        array(
                            'name'=>'Diagnostico',
                            'value'=>'$data->diagnosticoCorto'
                        ),
                        array(
                            'name'=>'Observaciones',
                            'value'=>'$data->observaciones'
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{ver}',
                            'buttons'=>array(
                                'ver'=>array(
                                    'label'=>'<i class="fa fa-eye"></i>',
                                    'url'=>'Yii::app()->createUrl("/consulta",array("hid"=>'.$historiaModel->id.',"cid"=>$data->id_consulta))',
                                    'options'=>array('title'=>'Ver Detalles'),
                                ),
                            ),
                        ),
                    ),
                ))?>
            </div>
        </div>
    </div>
</div>

<?php
Yii::app()->clientScript->registerScript('ajax','
    $("#rangoFecha").daterangepicker();
    $(".applyBtn").on("click",function(){
        var v_inicio=$("input[name=\'daterangepicker_start\']").val();
        var v_fin=$("input[name=\'daterangepicker_end\']").val()
        $.ajax({
            url:"'.CHtml::normalizeUrl(array('consulta/loadConsultaAjax')).'",
            type:"post",
            data:{inicio:v_inicio,fin:v_fin},
            success:function(datos){
                $("#tablaConsulta>table>tbody").html(datos);
            },
        });
    });
',CClientScript::POS_END);
?>
