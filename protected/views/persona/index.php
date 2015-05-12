<?php $this->pageTitle="Listado de Personas"; ?>



<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <form  role="search">
                    <div class="form-group has-primary">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">
                                    CSA - <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">CSA -</a></li>
                                    <li><a href="#">NOMBRE:</a></li>
                                    <li><a href="#">DNI</a></li>
                                </ul>
                            </div>
                            <input type="text" id="buscaPersona" class="form-control col-md-10" placeholder="Escribe para empezar a buscar">
                            <span class="input-group-btn">
                                <button class="btn btn-flat btn-primary" type="submit">Buscar</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo CHtml::link("<i class='fa fa-wheelchair'></i>Nuevo Paciente",array('Persona/create'),array('class'=>'btn btn-block btn-social bg-green'))?>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-block btn-social bg-red">
                            <i class="fa fa-stethoscope"></i>Nuevo Medico
                        </a>
                    </div>

                    <div class="col-md-2">
                        <a class="btn btn-block btn-social btn-tumblr">
                            <i class="fa fa-medkit"></i>Nuevo Personal
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row"">
    <div class="col-md-12">
        <div class="box box-solid" id="listaPersonas">
            <div class="box-body bg-gray" id="contenidoListaPersonas">
                <?php  $this->renderPartial('_listaPersonas',array('listaPersonas'=>$listaPersonas)); ?>
            </div>
        </div>

    </div>
</div>
<?php
    Yii::app()->clientScript->registerScript('buscadorAjax','
        $("#buscaPersona").keyup(function(){buscarPersona($(this))});
        function buscarPersona(control){
            var cad=control.val();
            if(cad.length>5||cad.length==0)
                ajaxBuscaPersona(control);
        };
        function ajaxBuscaPersona(control){
            $.ajax({
                url:"'.CHtml::normalizeUrl(array('persona/buscarPersonaAjax')).'",
                type:"post",
                data:{cadena:control.val()},
                success:function(datos){
                    $("#contenidoListaPersonas").html(datos);
                },
                complete:function(){
                    $(".overlay").remove();
                    $(".loading-img").remove();
                }
            });
            return false;
        }
        $(document).ajaxSend(function(){
            $("#listaPersonas").append($("<div class=\'overlay\'>"));
            $("#listaPersonas").append($("<div class=\'loading-img\'>"))
        });
    ');

?>