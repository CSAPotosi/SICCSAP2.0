<?php
/* @var $this Cie10Controller */

$this->breadcrumbs=array(
	'Cie10',
);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    <?php echo CHtml::label('Capitulo','capitulo'); ?>
                    <?php echo CHtml::dropDownList('capitulo',null,CHtml::listData(CapituloCie10::model()->findAll(),'num_capitulo','customTitle'),array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('Categoria','categoria'); ?>
                    <?php echo CHtml::dropDownList('categoria',null,array('Nada'=>'nada'),array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::label('Grupo','grupo'); ?>
                    <?php echo CHtml::dropDownList('grupo',null,array('Nada'=>'nada'),array('class'=>'form-control')); ?>
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
                            <tbody>
                            <tr>
                                <td>asds1</td>
                                <td>asds2</td>
                            </tr>
                            <tr>
                                <td>asds3</td>
                                <td>asds4</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#capitulo').change(function(){
            $.ajax({
                url: '<?php echo CHtml::normalizeUrl(array('/cie10/cargaCategoria')); ?>',
                type: 'post',
                data: { capitulo:$(this).val() },
                success: cargar_categoria,
                dataType:'json'
            });
        });
        $('#categoria').change(function(){
            $.ajax({
                url: '<?php echo CHtml::normalizeUrl(array('/cie10/cargaGrupo')); ?>',
                type: 'post',
                data: { categoria:$(this).val() },
                success: cargar_grupo,
                dataType:'json'
            });
        });
        $('#grupo').change(function(){
            $.ajax({
                url: '<?php echo CHtml::normalizeUrl(array('/cie10/cargaItem')); ?>',
                type: 'post',
                data: { grupo:$(this).val() },
                success: cargar_item,
                dataType:'json'
            });
        });
        function cargar_categoria(retorno){
            retorno.forEach(function(data){
                $('<option>').val(data.id_cat_cie10).text('['+data.codigo_inicial+'-'+data.codigo_final+'] '+data.titulo_cat_cie10).appendTo('#categoria');
            });
        }
        function cargar_grupo(retorno){
            retorno.forEach(function(data){
                $('<option>').val(data.codigo).text('['+data.codigo+'] '+data.titulo).appendTo('#grupo');
            });
        }
        function cargar_item(retorno){
            $('#item>tbody').children().remove();
            retorno.forEach(function(data){
                $('<tr><td>'+data.codigo+'</td><td>'+data.titulo+'</td></tr>').appendTo('#item>tbody');
            });
        }

        $('#item tbody tr').click(function(){
            alert($(this).children().eq(0).text());
        });
    });
</script>

