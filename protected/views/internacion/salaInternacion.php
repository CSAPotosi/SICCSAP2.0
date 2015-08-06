<?php
/* @var $this InternacionController */

$this->breadcrumbs=array(
    'Internacion',
);

$this->pageTitle='Salas y transferencias';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>

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
                    <li><?php echo CHtml::link('Datos generales',['internacion/index','id'=>$modelInternacion->id_inter]);?></li>
                    <li><?php echo CHtml::link('Nuevo diagnostico',['qweqw']);?></li>
                    <li><?php echo CHtml::link('Kardex de enfermeria',['evolucionEnfermeria/showKardex','id'=>$modelInternacion->id_inter]);?></li>
                    <li class="active"><?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter]);?></li>
                    <li><?php echo CHtml::link('Servicios',['qweqw']);?></li>
                    <li><?php echo CHtml::link('Examenes',['qweqw']);?></li>
                    <li class="dropdown">
                        <?php echo CHtml::link('Quirofanos <span class="caret"></span>',['#'],['class'=>'dropdown-toggle animate','data-toggle'=>'dropdown']);?>
                        <ul class="dropdown-menu" role="menu">
                            <li class="active"><a href="#">a</a></li>
                            <li><a href="#">b</a></li>
                        </ul>
                    </li>
                    <li><?php echo CHtml::link('Alta',['internacion/altaMedica','id'=>$modelInternacion->id_inter]);?></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="row">
    <?php if($modelInternacion->salas!=null):?>
        <div class="col-md-2">
            <div class="small-box bg-green">
                <div class="inner text-center">
                    <h3><?php echo $modelInternacion->salaActual->sala->numero_sala;?></h3>
                    <p><?php echo $modelInternacion->salaActual->sala->tipoSala->servicio->nombre_serv;?></p>
                </div>
            </div>
        </div>
    <?php endif;?>

    <div class="col-md-<?php echo ($modelInternacion->salas!=null)?'10':'12';?>">
        <div class="box box-solid">
            <div class="box-body">
                <?php echo CHtml::beginForm(['changeSala','id'=>$modelInternacion->id_inter],'post',['class'=>'form-horizontal']);?>
                    <div class="form-group">
                        <?php echo CHtml::label('Tipo de sala','tipoS',['class'=>'col-md-2 control-label']);?>
                        <div class="col-md-10">
                            <?php echo CHtml::textField('tipoS',null,['class'=>'form-control input-sm','placeholder'=>'Elija una sala','disabled'=>'disabled']); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::label('Sala','sala',['class'=>'col-md-2 control-label']);?>
                        <div class="col-md-10">
                            <div class="input-group input-group-sm">
                                <?php echo CHtml::textField('sala',null,['class'=>'form-control','placeholder'=>'Elija una sala','disabled'=>'disabled']); ?>
                                <span class="input-group-btn">
                                    <button class="btn bg-green" type="button" data-toggle='modal' data-target='#modalViewSala'>Elegir sala</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" id="btnCambiar" class="btn bg-green" disabled >Cambiar sala</button>
                        </div>
                    </div>
                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <?php $this->renderPartial('_tablaSala',['listaSalas'=>$modelInternacion->salas]);?>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalViewSala" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Elige una sala</h4>
            </div>
            <div class="modal-body" id="modalContenedorSala">

            </div>
            <div class="modal-footer clearfix">
                <?php echo CHtml::tag('button',array('id'=>'btnSala','class'=>'btn btn-primary pull-left'),'<i class="fa fa-plus"></i> Agregar',true)?>
                <?php echo CHtml::tag('button',array('id'=>'btnCloseSala','class'=>'btn btn-danger','data-dismiss'=>'modal'),'<i class="fa fa-times"></i> Cerrar',true)?>
            </div>
        </div>
    </div>
</div>


<?php
    Yii::app()->clientScript->registerScript('mostrarSala','
        $("#modalViewSala").on("show.bs.modal",ajaxMostrarSala);
        $("#tipoSala").on("change",ajaxMostrarSala);
        function ajaxMostrarSala(){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('sala/viewSalaAjax')).'",
                data:{id:$("#tipoSala").val()},
                success:function(datos){
                    $("#modalContenedorSala").html(datos);
                    $("#tipoSala").on("change",ajaxMostrarSala);
                    $(".small-box").on("click",clickSala);
                }
            });
        }

        function clickSala(){
            if($(this).hasClass("disabled")==false){
                $(".small-box").find(".check").children(".salaSelect").remove();
                var ele=$(this).find(".check");
                $(".id_sala").removeClass("selectedSala");
                ele.find(".id_sala").addClass("selectedSala");
                ele.append(\'<h3 class="salaSelect"><i class="fa fa-check-circle"></i></h3>\');
            }
        }

        $("#btnSala").on("click",function(){
            if($(".selectedSala").length>0){
                $("#sala").val($(".selectedSala").attr("data-sala"));
                $("#tipoS").val($(".selectedSala").attr("data-tipo"));
                var idSala=$(".selectedSala").val();
                $(".Sala_id_sala").remove();
                if(idSala!=0){
                    var input=$("<input name=\'Sala[id_sala]\' class=\'Sala_id_sala\' type=\'hidden\'>")
                    input.val(idSala);
                    $("form").append(input);
                    $("#btnCambiar").removeAttr("disabled");
                }
                else{
                    $("#btnCambiar").attr("disabled","disabled");
                    $("#tipoS").val("");
                }
            }
            $("#modalViewSala").modal("hide");
        });
    ');
?>