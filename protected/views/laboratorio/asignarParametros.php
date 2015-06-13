<?php
    $this->pageTitle='Asignacion de parametros a examen';
?>

<h2 class="page-header">
    PARAMETROS PARA <?php echo $modelLaboratorio->serviciodelab->nombre_serv;?>
</h2>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php if(Yii::app()->user->hasFlash('success')) :?>
        <div class="alert alert-success">
            <i class="fa fa-check"></i>
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
        <?php endif;?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Elije los parametros</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="input-group">
                        <?php echo CHtml::textField('searchSourceItem',null,['class'=>'form-control','placeholder'=>'Buscar parametro']);?>
                        <span class="input-group-addon bg-blue-gradient">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>

                </div>
                <ul class="todo-list" id="source-list">
                    <?php foreach($parametroList as $itemP):?>
                        <?php if(!in_array($itemP,$modelLaboratorio->parametros)):?>
                            <li class="<?php echo ($itemP->estado_par_lab==0)?'done':'';?>">
                                <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <?php echo CHtml::checkBox('Parametro[item][]',false,[($itemP->estado_par_lab==0)?'disabled':'flag'=>'disabled','value'=>$itemP->id_par_lab,'class'=>'minimal-red']);?>
                                <span class="text"><?php echo $itemP->nombre_par_lab;?></span>
                                <small class="label label-primary"><?php echo $itemP->unidad_par_lab;?></small>
                            </li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <?php echo CHtml::beginForm(['laboratorio/asignarParametros','id_examen'=>$modelLaboratorio->id_servicio],'post');?>
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Lista de parametros escogidos</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="input-group">
                        <?php echo CHtml::textField('searchTargetItem',null,['class'=>'form-control','placeholder'=>'Buscar parametro']);?>
                        <span class="input-group-addon bg-blue-gradient">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
                <?php echo CHtml::hiddenField('Parametro[envio]','1');?>
                <ul class="todo-list ui-sortable" id="target-list">
                    <?php foreach($modelLaboratorio->parametros as $itemP):?>
                        <li>
                        <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                        </span>
                            <?php echo CHtml::checkBox('Parametro[item][]',false,['value'=>$itemP->id_par_lab,'checked'=>true,'class'=>'minimal-red']);?>
                            <span class="text"><?php echo $itemP->nombre_par_lab;?></span>
                            <small class="label label-primary"><?php echo $itemP->unidad_par_lab;?></small>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="box-footer clearfix no-border">
                <?php echo CHtml::submitButton('Guardar',['class'=>'btn btn-primary pull-right']);?>
            </div>
        </div>
        <?php echo CHtml::endForm();?>
    </div>
</div>






<?php

Yii::app()->clientScript->registerScript('changeList','
    $("input[type=\'checkbox\']").iCheck({
        checkboxClass: "icheckbox_minimal-blue"
    });

    $("#target-list input").iCheck("check");
    $("#source-list input").on("ifChecked",toTargetList);

    $("#target-list input").on("ifUnchecked",toSourceList);

    function toTargetList(e){
        var par=$(this).parents("li");
        $("#target-list").append(par);
        $("#target-list input").on("ifUnchecked",toSourceList);
    }

    function toSourceList(e){
        var par=$(this).parents("li");
        $("#source-list").append(par);
        $("#source-list input").on("ifChecked",toTargetList);
    }

    $("#searchSourceItem").on("keyup",function(){
        var texto=$(this).val().toUpperCase();
        $("#source-list li:has(span.text)").addClass("hide");
        $("#source-list li:has(span.text:contains("+texto+"))").removeClass("hide");
    });

    $("#searchTargetItem").on("keyup",function(){
        var texto=$(this).val().toUpperCase();
        $("#target-list li:has(span.text)").addClass("hide");
        $("#target-list li:has(span.text:contains("+texto+"))").removeClass("hide");
    });

    $(".alert.alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
');
?>

