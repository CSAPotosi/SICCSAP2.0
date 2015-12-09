<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['site/index'])."Pagina Principal";
$this->breadcrumbs=array(
    'Horarios',
);
?>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Crear Horario
                    </div>
                    <div class="box-body">
                        <div id="contenedoradmi">
                        <?php $this->renderPartial('_form',array('horario'=>$horario))?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Lista de Horarios Registrados
                    </div>
                    <div class="box-body">
                        <?php $this->renderPartial('listahorarios',array('listahorarios'=>$listahorarios))?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid" id="detalleHorario">
                    <div class="box-header">
                        Horarios Existentes
                        <div class="box-tools">
                            <a href="#" class="btn btn-primary"><i class="fa fa-cog"></i> Configurar</a>
                        </div>
                    </div>
                    <div class="box-body">
                    </div>
                    <div id="elementos"></div>
                </div>
            </div>
        </div>
    </div>


</div>


<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
?>
<?php Yii::app()->clientScript->registerScript('convenio_institucion','



     $("#btnhorario").on("click",function(){
        $("#horario-form").submit();
     });
     $(".btnViewDetailHorario").on("click",verturnos);
     $(".btnViewDetailHorario[data-id=\''.$id_h.'\']").trigger("click");


     function verturnos(){
        $.ajax({
            url:$(this).attr("href"),
            type:"get",
            success:function(datos){
               $("#elementos").children().remove();
               $("#detalleHorario .box-body").html(datos);
               $.each(h_list,function(i,item){
                    renderComplete(item);
               });
            }
        });
        $("#detalleHorario .box-tools a").attr("href",$(this).data("href"));
        return false;
     }

     function renderComplete(item){
        var $item=$("<div class=\'block-h\'>").append($("<p>").text(item.h_start+" - "+item.h_end));
        var $cell=$(".table-turno>tbody>tr").eq(item.hh_start).children("td").eq(item.day-1);

        var width=$cell.width();
        var height=$cell.parent("tr").height()/60;

        $item.width(width);
        $item.height(item.len*height);

        $("#elementos").append($item);

        var pos=$cell.offset();
        pos.left=pos.left+(parseFloat($cell.css("padding-left")));
        pos.top=pos.top+height*item.mm_start;

        $item.offset(pos);
     }
');