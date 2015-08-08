
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Registrar Seguro de Paciente
                    </div>
                    <div class="box-body">
                        <?php $this->renderPartial('form_seguro_convenio',array('paciente'=>$paciente,'seguro'=>$seguro,'listapacientesasegurados'=>$listapacientesasegurados))?>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Lista de Seguros Adquiridos
                    </div>
                    <div class="box-body">
                        <table class="table table-hover bordered">
                            <tr>
                                <th>Convenio Intitucional</th>
                                <th>Paciente</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Actualizacion</th>
                                <th>tipo Asegurado</th>
                                <th>Paciente Titular</th>
                                <th>Estado</th>
                            </tr>
                            <?php foreach($listaadquiridos as $list):?>
                                <tr>
                                    <td><?php echo $list->ConvenioInstitucional->nombre_convenio?></td>
                                    <td><?php echo $list->PacienteAsegurado->personapa->nombreCompleto?></td>
                                    <td><?php echo $list->fecha_inicio?></td>
                                    <td><?php echo $list->fecha_actualizacion?></td>
                                    <td><?php echo $list->tipo_asegurado?></td>
                                    <?php if($list->PacienteTitular!=null){?>
                                    <td><?php echo $list->PacienteTitular->personapa->nombreCompleto?></td>
                                    <?php }else{?>
                                    <td></td>
                                    <?php }?>
                                    <td><input type="checkbox" class="btnChangeState" <?php echo ($list->estado)?'checked':''; ?> data-toggle="toggle" data-size="mini" data-on="ACTIVO" data-onstyle="primary" data-offstyle="danger" data-off="INACTIVO" data-url="<?php echo CHtml::normalizeUrl(['ConvenioInstitucion/ChangeStateAsegurado','id'=>$list->id_seg_con]);?>"></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
?>
<?php Yii::app()->clientScript->registerScript('seguro_convenio','
    $("#datetimepicker1").datetimepicker({
            locale:"es",
            defaultDate:"'.date('m/d/Y',strtotime('+0 day')).'",
            format:"DD-MM-YYYY HH:mm A",
            maxDate:"'.date('m/d/Y',strtotime('+10 day')).'"
        });
    $("#listatipopaciente").on("change",mostrarbuscarpaciente);
    function mostrarbuscarpaciente(){
        var texto=$(this).val();
        var asegurado=$("#idpacienteasegurado").val();
        $.ajax({
               url:"'.CHtml::normalizeUrl(array('ConvenioInstitucion/changeTipoPaciente')).'",
               type:"post",
               data:{texto:texto,paciente:asegurado},
               success:function(datos){
                    $("#contenedortipopaciente").html(datos);
                    EventoSeguro();
               }
            });
    }
    function EventoSeguro(){
        $("#btnSeguroTitular").on("click",SeguroPaciente);
        if($("#convenio_insti").val()==""){$("#btnConvenio_Insti").attr("disabled",true);}
        else{$("#btnConvenio_Insti").removeAttr("disabled");}
    }
    function SeguroPaciente(){
        $("#PacientesAsegurados").modal("show");
    }
    $("#btnConvenio_Insti").on("click",enviarseguro);
    function enviarseguro(){
        $("#convenio-seguro-form").submit();
    }
    $(".aseguradospacientes").on("click",elegirconvenio);
    function elegirconvenio(){
        $("#convenio_insti").val($(this).attr("data-idconvenio"));
        $("#convenio_insti_nombre").val($(this).attr("data-convenio"));
        $("#id_paciente_titular_nombre").val($(this).attr("data-paciente"));
        $("#paciente_titular").val($(this).attr("data-idpaciente"));
        $("#btnConvenio_Insti").removeAttr("disabled");
        $("#PacientesAsegurados").modal("hide");

    }
    $(".btnChangeState").on("change",function(){
        $.ajax({
            url:$(this).attr("data-url"),
            type:"get",
            success:function(datos){
                $("#conte").html(datos);
                $(".aseguradospacientes").on("click",elegirconvenio);
            }
        });
    });
');