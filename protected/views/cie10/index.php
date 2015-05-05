<style>
    select,tr>td{
        font-family: 'Courier New', Courier, monospace;
    }
</style>

<div class="row">
    <form>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    <div class="input-group">
                        <?php echo CHtml::textField('Buscador',null,array('id'=>'buscador','class'=>'form-control','placeholder'=>'ESCRIBE EL CODIGO, TITULO O DESCRIPCION DEL ITEM'))?>
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('Capitulo','capitulo'); ?>
                    <?php echo CHtml::dropDownList('capitulo',null,CHtml::listData(CapituloCie10::model()->findAll(),'num_capitulo','customTitle'),array('id'=>'capitulo','class'=>'form-control','empty'=>'SELECCIONE UN CAPITULO','ajax'=>array(
                        'type'=>'POST',
                        'url'=>CHtml::normalizeUrl(array('/cie10/cargaCategoria')),
                        'update'=>'#categoria',
                    ))); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('Categoria','categoria'); ?>
                    <?php echo CHtml::dropDownList('categoria',null,array(''=>'ANTES SELECCIONE UN CAPITULO'),array('id'=>'categoria','class'=>'form-control','ajax'=>array(
                        'type'=>'POST',
                        'url'=>CHtml::normalizeUrl(array('/cie10/cargaGrupo')),
                        'update'=>'#grupo',
                    ))); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('Grupo','grupo'); ?>
                    <?php echo CHtml::dropDownList('grupo',null,array(''=>'ANTES SELECCIONE UNA CATEGORIA'),array('id'=>'grupo','class'=>'form-control','ajax'=>array(
                        'type'=>'POST',
                        'url'=>CHtml::normalizeUrl(array('/cie10/cargaItem')),
                        'update'=>'#Items',
                        'complete'=>'js:function(){
                            $("#Items>tr").on("click",function(){
                                $("#Items>tr").removeClass("bg-blue");
                                $(this).toggleClass("bg-blue");
                            });
                        }',
                    ))); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('Item',null); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="item">
                            <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>TITULO</th>
                            </tr>
                            </thead>
                            <tbody id="Items">
                            <tr>
                                <td colspan="2">Ningun Elemento Encontrado</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </form>
</div>

<?php
    Yii::app()->clientScript->registerScript('buscarAjax','$("#buscador").keyup(function(){
        if($(this).val().length>3)
            $.ajax({
                type:"post",
                data:{buscador:$(this).val()},
                url:"'.CHtml::normalizeUrl(array('/cie10/buscaItem')).'",
                success:function(datos){
                    $("#Items").html(datos);
                    $("#Items>tr").on("click",clickRow);
                }
            });
        });
        function clickRow(){
            $("#Items>tr").removeClass("bg-blue");
            $(this).toggleClass("bg-blue");
        }
    ');

?>