<?php
$this->breadcrumbs=array(
    'Salas disponibles',
);

$this->pageTitle= CHtml::link('<i class="fa fa-arrow-left"></i>',['/']).' Salas disponibles';

?>

<div class="box box-primary box-solid" id="detailSala">
    <div class="box-header">
        <?php echo CHtml::dropDownList('tipoSala',null,CHtml::listData(TipoSala::model()->with(['servicio'=>['condition'=>'estado_serv=1']])->findAll(),'id_tipo_sala','servicio.nombre_serv'),['class'=>'form-control']);?>
    </div>
    <div class="box-body">
        hola mundo
    </div>
</div>



<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/resources/plugins/toggle/bootstrap-toggle.min.js',CClientScript::POS_END);
?>

<?php
    Yii::app()->clientScript->registerScript('chargeSala','
        $(document).ready(loadSala);

        $("#tipoSala").on("change",loadSala);

        function loadSala(){
            $.ajax({
                beforeSend:function(){
                    $("#detailSala").append("<div class=\'overlay\'><i class=\'fa fa-refresh fa-spin\'></i></div>");
                },
                url:"'.CHtml::normalizeUrl(['sala/listSala','ajax'=>1]).'",
                data:{id_tipo:$("#tipoSala").val()},
                method:"get",
                success:function(datos){
                    $("#detailSala .box-body").html(datos);
                },
                complete:function(){
                    $(".changeState").bootstrapToggle();
                    $(".changeState").on("change",changeState);
                    $(".overlay").remove();
                }
            });
        }

        function changeState(){
            var dato=$(this).prop("checked");
            var estado=0;
            if(dato==true){
                $(this).parents(".info-box").removeClass("bg-yellow").addClass("bg-blue");
                estado=1;
            }
            else{
                $(this).parents(".info-box").removeClass("bg-blue").addClass("bg-yellow");
                estado=3;
            }
            $.ajax({
                url:"'.CHtml::normalizeUrl(['sala/simpleChangeStateSala']).'",
                data:{estado:estado,id_sala:$(this).attr("data-sala")},
                method:"get"
            });
        }
    ');
?>