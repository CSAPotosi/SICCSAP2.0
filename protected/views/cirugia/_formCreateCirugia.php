<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$model))?>

<nav class="navbar navbar-menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuHistoria" aria-expanded="false">
                <span class="sr-only">Opciones de historia</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menuHistoria">
            <ul class="nav navbar-nav">
                <li ><?php echo CHtml::link("<i class='fa fa-list'></i> Historia clinica",array('historialPaciente/view','id'=>$model->id_historial))?></li>
                <li><?php echo ($model->paciente->estado_paciente!='INTERNADO')?CHtml::link("<i class='fa fa-wheelchair'></i> Nueva internacion",['internacion/createInternacion','id'=>$model->id_historial]):CHtml::link("<i class='fa fa-wheelchair'></i> Internacion actual",['internacion/index','id'=>$model->internacionActual->id_inter]); ?></li>
                <li class="dropdown active">
                    <?php echo CHtml::link('Quirofanos <span class="caret"></span>',['#'],['class'=>'dropdown-toggle animate','data-toggle'=>'dropdown']);?>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo CHtml::link('Programar cirugia',['cirugia/programarCirugia','id_h'=>$model->id_historial]);?></li>
                        <li class="active"><?php echo CHtml::link('Registrar cirugia',['cirugia/indexCirugia','id_h'=>$model->id_historial]);?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="box box-primary box-solid">
    <div class="box-body">
        <?php echo CHtml::beginForm(['cirugia/createCirugiaPost','id'=>$modelCirugia->id_c],"post");?>

        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Los campos con <span class="required">*</span> son obligatorios.
        </div>
        <?php echo CHtml::errorSummary(array($modelCirugia),'Corriga los siguientes problemas para continuar:',null,array('class'=>'alert alert-danger')) ; ?>

        <?php echo CHtml::activeHiddenField($modelCirugia,'id_historial');?>
        <?php echo CHtml::activeHiddenField($modelCirugia,'estado_cirugia',['value'=>'INICIADA']);?>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'fecha_hora_ent');?>
            <?php echo CHtml::activeTextField($modelCirugia,'fecha_hora_ent',['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'fecha_hora_ent',['class'=>'label label-danger']);?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'detalle_instru');?>
            <?php echo CHtml::activeTextArea($modelCirugia,'detalle_instru',['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'detalle_instru',['class'=>'label label-danger']);?>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($modelCirugia,'id_q');?>
            <?php echo CHtml::activeDropDownList($modelCirugia,'id_q',CHtml::listData(Quirofano::model()->findAll("estado_q=true"),'id_q','nombre_q'),['class'=>'form-control']);?>
            <?php echo CHtml::error($modelCirugia,'id_q',['class'=>'label label-danger']);?>
        </div>
        <table class="table table-bordered table-hover" id="participantes-table">
            <thead>
            <tr>
                <th width="40%">NOMBRE</th>
                <th width="40%">ROL EN LA CIRUGIA</th>
                <th width="10%">RESPONSABLE</th>
                <th width="10%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $index=0; $modelP=new ParticipanteCirugia();?>
            <?php foreach($listaP as $itemP):?>
                <tr>
                    <td>
                        <?php echo CHtml::activeHiddenField($itemP,"[$index]id_per",["data-index"=>$itemP->id_per]);?>
                        <div class="input-group input-group-sm">
                            <?php echo CHtml::textField("nombre_part",($itemP->persona!=null)?$itemP->persona->nombreCompleto:'',['class'=>'form-control']);?>
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-search" type="button" data-index="<?php echo $index;?>" data-toggle="modal" data-target="#modalBuscaPersona"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <?php echo CHtml::error($itemP,"[$index]id_per",['class'=>'label label-danger']);?>
                    </td>
                    <td>
                        <?php echo CHtml::activeTextField($itemP,"[$index]rol_cirugia",['class'=>'form-control input-sm']);?>
                        <?php echo CHtml::error($itemP,"[$index]rol_cirugia",['class'=>'label label-danger']);?>
                    </td>
                    <td class="text-center">
                        <?php echo CHtml::activeRadioButton($itemP,"[$index]es_responsable",['class'=>'responsable'])?>
                    </td>
                    <td class="text-center">
                            <button data-index="<?php echo $index?>" type="button" class="btn btn-primary btn-sm btn-remove-participante"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                <?php $index++; endforeach;?>

            <tr>
                <td>
                    <?php echo CHtml::activeHiddenField($modelP,"[$index]id_per",["data-index"=>$modelP->id_per]);?>
                    <div class="input-group input-group-sm">
                        <?php echo CHtml::textField("nombre_part",($modelP->persona!=null)?$modelP->persona->nombreCompleto:'',['class'=>'form-control']);?>
                        <span class="input-group-btn">
                                <button class="btn btn-primary btn-search" type="button" data-index="<?php echo $index;?>" data-toggle="modal" data-target="#modalBuscaPersona"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <?php echo CHtml::error($modelP,"[$index]id_per",['class'=>'label label-danger']);?>
                </td>
                <td>
                    <?php echo CHtml::activeTextField($modelP,"[$index]rol_cirugia",['class'=>'form-control input-sm']);?>
                    <?php echo CHtml::error($modelP,"[$index]rol_cirugia",['class'=>'label label-danger']);?>
                </td>
                <td class="text-center">
                    <?php echo CHtml::activeRadioButton($modelP,"[$index]es_responsable",['class'=>'responsable'])?>
                </td>
                <td class="text-center">
                    <button data-index="<?php echo $index?>" type="button" class="btn btn-primary btn-sm" id="btn-save-participante"><i class="fa fa-save"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php echo CHtml::endForm();?>
    </div>
</div>





<div class="modal fade modal-primary" id="modalBuscaPersona" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buscar personas</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnClose','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>


<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/fullcalendar.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/fullcalendar.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/fullcalendar/lang-all.js',CClientScript::POS_END);

$fecha=($modelCirugia->fecha_hora_prog!=null)?"'{$modelCirugia->fecha_hora_prog}'":'new Date()';
Yii::app()->clientScript->registerScript('eventos','
    $("#Cirugia_fecha_hora_ent").datetimepicker({
        locale:"es",
        defaultDate:new Date(),
        format:"YYYY-MM-DD HH:mm",
        minDate:"'.date('m/d/Y',strtotime('+0 day')).'"
    });

    var row_index=0;
    var newItem=$("#btn-save-participante").closest("tr").clone();

    $(document).on("ready",function(){
        agregarEventosFila();
    });

    $(".responsable").iCheck({radioClass:"iradio_square-blue"});
    $(".responsable").on("ifChecked",function(){
        $(".responsable").not(this).iCheck("uncheck");
    });

    $("#modalBuscaPersona").on("show.bs.modal",function(){
        $.ajax({
            url:"'.CHtml::normalizeUrl(['cirugia/loadBuscadorAjax']).'",
            success:function(datos){
                $("#modalBuscaPersona .modal-body").html(datos);
                $("input[name=\'tipo_persona\']").iCheck({radioClass:"iradio_square-blue"});
                $("#txtPersona").on("keyup",function(){
                    var tipo=$("input[name=\'tipo_persona\']:checked").val();
                    var texto=$(this).val();
                    $.ajax({
                        beforeSend:function(){$("#lista-completa").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>"); },
                        url:"'.CHtml::normalizeUrl(['cirugia/loadListaPersonas']).'",
                        data:{tipo:tipo,valor:texto.toUpperCase()},
                        method:"get",
                        success:function(datos){
                            $("#lista-completa .box-body").html(datos);
                            $(".users-list li").on("click",function(){
                                var id_persona=$(this).data("id");
                                if($("#participantes-table input[data-index=\'"+id_persona+"\']").length==0){
                                    $(".btn-search[data-index=\'"+row_index+"\']").closest("tr").find("input[type=\'hidden\']").val($(this).data("id"));
                                    $(".btn-search[data-index=\'"+row_index+"\']").closest("tr").find("#nombre_part").val($(this).find(".users-list-name").text());
                                }
                                //$("#ParticipanteCirugia_id_per").val($(this).data("id"));
                                //$("#nombre_medico").val($(this).find(".users-list-name").text());
                                $("#modalBuscaPersona").modal("hide");
                            });
                        },
                        complete:function(){ $("#lista-completa .overlay").remove();}
                    });
                });
            }
        });
    });


    function agregarEventosFila(){
        $("#btn-save-participante").on("click",clickSave=function(){
            var filaActual=$(this).closest("tr");
            filaActual.children("td").last().append("<button type=\'button\' class=\'btn btn-primary btn-remove-participante btn-sm\'><i class=\'fa fa-times\'></i></button>");
            var nuevo = newItem.clone();
            var indice=$(this).data("index")+1;
            var indice_ini=nuevo.find("#btn-save-participante").data("index");

            nuevo.find("input,select").each(function(){
                $(this).attr("name",$(this).attr("name").replace("["+indice_ini+"]","["+indice+"]"));
                $(this).attr("id",$(this).attr("id").replace("_"+indice_ini+"_","_"+indice+"_"));
            });
            nuevo.find(".btn-search").data("index",indice);
            nuevo.find(".btn-search").attr("data-index",indice);
            nuevo.find("#btn-save-participante").data("index",indice);
            nuevo.find("#btn-save-participante").attr("data-index",indice);
            $(this).closest("tbody").append(nuevo);
            $(this).remove();

            $(".responsable").iCheck({radioClass:"iradio_square-blue"}).on("ifChecked",function(){
                $(".responsable").not(this).iCheck("uncheck");
            });

            $(".btn-remove-participante").on("click",function(){
                $(this).closest("tr").remove();
            });
            $(".btn-search").on("click",function(){
                row_index=$(this).data("index");
            });
            $("#btn-save-participante").on("click",clickSave);
        });

        $(".btn-remove-participante").on("click",function(){
                $(this).closest("tr").remove();
        });

        $(".btn-search").on("click",function(){
            row_index=$(this).data("index");
        });

    }

');
?>
