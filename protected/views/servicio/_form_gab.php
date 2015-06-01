<div class="row">
    <div class="col-md-12">
        <?php $this->renderPartial('_form_servicios',array())?>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Examenes de Gabinete</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-aqua" data-target="#gabinete" data-toggle="modal">
                                <b>Nuevo</b>
                            </button>
                        </div>
                    </div>
                    <div id="contenido_gabinete">
                        <?php $this->renderPartial('_form_gabinete_row',array('listgabinete'=>$listgabinete)); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Items de Examenes de Gabinete</h3>
                        <div class="input-group margin">
                            <input class="form-control" type="text" id="buscaitemgab" placeholder="Item de Examen de gabinete">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-float" type="button"><i class="fa fa-fw fa-search"></i></button>
                        </span>
                        </div>

                    </div>
                    <div class="contenedor" id="contenedor_cat_item">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="gabinete" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Examenes de Gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorgabinetemodal">
                <?php $this->renderPartial('_form_gabinete',array('gabinete'=>new CategoriaExGabinete)); ?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="CreGabinete">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="gabineteupd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Examenes de Gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorgabinetemodalupd">
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="updGabinete">Actualizar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="gabineteex" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Examenes de Gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorgabinetemodalex">
                <?php $this->renderPartial('_form_gabinete',array('gabinete'=>new CategoriaExGabinete)); ?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="CreGabineteex">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="gabineteexitem" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Items de Examenes de Gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorgabinetemodalexitem">
                <?php $this->renderPartial('_form_gabinete_ex',array('servicio'=>new Servicio,'precio'=>new PrecioServicio))?>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="CreGabineteexitem">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="gabineteexitemupd" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Actualizar items de Examenes de gabinete</h4>
            </div>
            <div class="modal-body" id="contenedorgabinetemodalexitemupd">

            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary pull-left" id="updGabineteexitem">Guardar</button>
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('pruebagabinete ','
    $(document).ready(function(){
        cargarEventosClickgab();
        $(\'#CreGabinete\').click(function(){
            var data=$("#gabinete-form").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CreargabineteAjax")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenido_gabinete").html(datos);
                        $("#gabinete").modal("hide");

                    }
                    else{
                        $("#contenedorgabinetemodal").html(datos);
                    }
                }
            });
        });
        $("#gabinete").on("hidden.bs.modal",nuevoFormgabinete);
        function nuevoFormgabinete(){
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CreargabineteAjax")).'\',
                type: \'post\',
                success: function(datos)
                {
                    $("#contenedorgabinetemodal").html(datos);
                    cargarEventosClickgab();
                }

            });
        }
        function cargarEventosClickgab(){
            $(".btnUpdgab").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenedorgabinetemodalupd").html(datos);
                    }
                });
                $("#gabineteupd").modal("show");
                return false;
            });
            $(".btnDelgab").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                        $("#contenido_gabinete").html(datos);
                        cargarEventosClickgab();
                    }
                });
                return false;
            });
            $(".btnItemgab").on("click",nuevocatitemgab);
        }
        function nuevocatitemgab(){
            $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                    $("#contenedor_cat_item").html(datos);
                    cargarEventosClickGabitem();
                    }
                });
                return false;
        }
        $("#updGabinete").on("click",function(){
            var data=$("#gabinete-form-update").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/Updategab")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenido_gabinete").html(datos);
                        $("#gabineteupd").modal("hide");
                        cargarEventosClickgab();
                    }
                    else{
                        $("#contenedorgabinetemodalupd").html(datos);
                    }
                }
            });
        });
        $("#gabineteexitem").on("hidden.bs.modal",nuevogabitem);
        $("#CreGabineteexitem").on("click",itemgabcre);
         function itemgabcre(){
            $("#cat_gab_item_campo").val($("#campo_item_cat_gab").val());
            var data=$("#form-gab-item").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CrearGabItem")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_item").html(datos);
                        $("#gabineteexitem").modal("hide");
                        cargarEventosClickGabitem()
                        nuevogab();
                    }
                    else{
                        $("#contenedorgabinetemodalexitem").html(datos);
                    }
                }
            });
            return false;

         }
         function nuevogabitem(){
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/CrearGabItem")).'\',
                type: \'post\',
                success: function(datos)
                {
                    $("#contenedorgabinetemodalexitem").html(datos);

                }
            });
            return false;
         }
         function nuevogab(){
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/Nuevocatgab")).'\',
                type: \'post\',
                success: function(datos)
                {
                    $("#contenido_gabinete").html(datos);
                    cargarEventosClickgab();
                }
            });
            return false;
         }
         function cargarEventosClickGabitem(){
            $(".btnitemUpdcatgab").on("click",function(){
                $.ajax({
                    url:$(this).attr("href"),
                    type:"post",
                    success:function(datos){
                    $("#contenedorgabinetemodalexitemupd").html(datos);
                    $("#updGabineteexitem").on("click",upditemgab());
                    }
                });
                $("#gabineteexitemupd").modal("show");
                return false;
            })
            $("#updGabineteexitem").on("click",function(){
            var data=$("#form-upd-gab-item").serialize();
            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Servicio/Updateitemcatgab")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                var contenido=$("<div>").html(datos);
                    if(contenido.children("#flag").val()==null){
                        $("#contenedor_cat_item").html(datos);
                        $("#gabineteexitemupd").modal("hide");
                        cargarEventosClickGabitem()
                        nuevogabitem();
                    }
                    else{
                        $("#contenedorgabinetemodalexitemupd").html(datos);
                    }
                }
            });
            return false;
            });
            $(".btnitemDelcatgab").on("click",eliminarcatgab);
         }
         function eliminarcatgab(){
            $.ajax({
                url:$(this).attr("href"),
                type:"post",
                success:function(datos){
                    $("#contenedor_cat_item").html(datos);
                    cargarEventosClickGabitem();
                    nuevogab();
                }
            });
            return false;
        }
        $("#buscaitemgab").on("keyup",buscarItemgab);
        function buscarItemgab(){
            var control=$(this);
            var cad=control.val();
            if(cad.length>1){
                var valor=control.val();
                ajaxBuscaitemgab(valor);
            }
            if(cad.length==0){
                var valor="";
                ajaxBuscaitemgab(valor);
            }
        };
        function ajaxBuscaitemgab(valor){
            $.ajax({
               url:"'.CHtml::normalizeUrl(array('servicio/BuscarItemgabAjax')).'",
               type:"post",
               data:{cadena:valor,catitem:$("#campo_item_cat_gab").val()},
               success:function(datos){
                   $("#contenedor_cat_item").html(datos);
                   cargarEventosClickGabitem();
               }
            });
            return false;
        }
    });
');