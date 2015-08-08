<?php $this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['/'])."Pagina de Inicio"; ?>

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
                <li class="active"><?php echo CHtml::link("<i class='fa fa-list'></i> Listar pacientes",array('Persona/index'))?></li>
                <li><?php echo CHtml::link("<i class='fa fa-wheelchair'></i> Nuevo Paciente",array('Persona/create'))?></li>
            </ul>
        </div>
    </div>
</nav>


<div class="row">
    <div class="col-md-12">
        <form  role="search">
            <div class="form-group has-primary">
                <div class="input-group">
                    <input type="text" id="buscaPersona" class="form-control col-md-10" placeholder="Escribe para empezar a buscar">
                    <span class="input-group-btn">
                        <button class="btn btn-flat btn-primary" type="submit">Buscar</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row"">
    <div class="col-md-12">
        <div class="box box-solid" id="listaPersonas">
            <div class="box-body bg-gray" id="contenidoListaPersonas">
                <?php  $this->renderPartial('_listaPersonas',array('listaPersonas'=>$listaPersonas,'tipo_persona'=>$tipo_persona));?>
            </div>
        </div>
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScript('buscadorAjax','
        $("#buscaPersona").keyup(function(){buscarPersona($(this))});
        function buscarPersona(control){
            var cad=control.val();
            ajaxBuscaPersona(control);
        };
        function ajaxBuscaPersona(control){
            var valor="";
            if(control.val().length>0)
                valor=control.val().toUpperCase();
            $.ajax({
                beforeSend:function(){
                    $("#listaPersonas").append($("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>"));
                },
                url:"'.CHtml::normalizeUrl(array('persona/buscarPersonaAjax')).'",
                type:"post",
                data:{cadena:valor},
                success:function(datos){
                    $("#contenidoListaPersonas").html(datos);
                },
                complete:function(){
                    $(".overlay").remove();
                }
            });
            return false;
        }
    ');

?>