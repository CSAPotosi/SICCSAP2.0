<script src="<?php echo Yii::app()->baseUrl; ?>/js/carpeta/jquery.yiigridview.js"></script>
<?php
/*
 *
 *  $("body").on("keyup",".filters > td > input", function() {
        $("#personas-grid").yiiGridView("update", {
            data: $(this).serialize()
        });
        return false;
    });
    function getnombres(id){
        $("#idpersona").prop("value",id);
        $("#nombrepersona").prop("value",$("#personas-grid tr.selected>td").eq(1).text()+" "+$("#personas-grid tr.selected>td").eq(2).text()+" "+$("#personas-grid tr.selected>td").eq(3).text());
    };
    //$("#hola").text("Soy un texto generado por jQuery!");
    $("#personas-grid").hide();
    $("#botonpersona").on("click",funcion);
    function funcion(){
        $("#personas-grid").slideToggle(1000);
        filtrar();
    };
 *
 *
 *      <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'personas-grid',
            'dataProvider'=>$personas->search(),
            'filter'=>$personas,
            'itemsCssClass' => 'table table-bordered table-striped dataTable',
            'columns'=>array(
                'dni',
                'nombres',
                'primer_apellido',
                'segundo_apellido',
            ),
            'selectionChanged'=>'function(id){getnombres($.fn.yiiGridView.getSelection(id))}',
        )); ?>
 *
 *
*/



Yii::app()->clientScript->registerScript('search', '
    filtrar();
    $("#personas-grid").hide();

    $("#nombrepersona").on("click",function(){
        $("#personas-grid").slideToggle(400);
        $(this).prop("maxlength","0");
        $(this).prop("placeholder","Escoger una persona de la siguiente tabla:");
    });

    $("#botonpersona").on("click",funcion);
    function funcion(){
        $("#personas-grid").slideToggle(400);
    };

    $("body").on("keyup","#personastable input", function() { filtrar(); });

    $("#personastable tbody tr").on("click",getnombres);
    function getnombres(){
        $("#idpersona").prop("value",$(this).attr("value"));
        $("#nombrepersona").prop("value",$(this).children("td").eq(1).text()+" "+$(this).children("td").eq(2).text()+" "+$(this).children("td").eq(3).text());
        $("#personastable tr").removeClass("bg-aqua");
        $(this).addClass("bg-aqua");
        $("#personas-grid").slideToggle(400);
    };

    function filtrar()
    {
        var data= "dni="+$("#dni_s").val()+"&nombres="+$("#nombres_s").val().toUpperCase()+"&apellido1="+$("#apellido1_s").val().toUpperCase()+"&apellido2="+$("#apellido2_s").val().toUpperCase();
        $.ajax({
            data: data,
            type: "POST",
            dataType: "json",
            url: \''.CHtml::normalizeUrl(array("/Usuario/listarPersona")).'\',
            success: function(data){
                var html="";
                if(data.length>0){
                    $.each(data, function(i,item){
						html += "<tr value="+item.id+">"
							if(item.dni!=null)html += "<td>"+item.dni+"</td>"; else html += "<td></td>"
							if(item.nombres!=null)html += "<td>"+item.nombres+"</td>"; else html += "<td></td>"
							if(item.primer_apellido!=null)html += "<td>"+item.primer_apellido+"</td>"; else html += "<td></td>"
							if(item.segundo_apellido!=null)html += "<td>"+item.segundo_apellido+"</td>"; else html += "<td></td>"
						html += "</tr>";
					});
                }
                if(html == "")
                    html = campos + \'<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>\';
				html = html;
				// añadimos  a nuestra tabla todos los datos encontrados mediante la funcion html
				$("#personastable tbody").html(html);
				$("#personastable tbody tr").on("click",getnombres);
            }
        });
    }
');
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'usuario-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">

        <?php echo $form->labelEx($model,'Persona'); ?>
        <?php echo $form->hiddenField($model,'id_persona',array('class'=>'form-control','id'=>'idpersona')); ?>

        <div class="input-group input-group-sm">
            <input type="text" id="nombrepersona" class="form-control"/>
            <span class="input-group-btn">
              <button class="btn btn-info btn-flat" type="button" id="botonpersona"><i class="fa fa-fw fa-user-plus"></i></button>
            </span>
        </div>
        <?php echo $form->error($model,'id_persona'); ?>
        <div id="personas-grid">
        <table class="table table-bordered table-striped dataTable" id="personastable">
            <thead>
                <tr>
                    <th style="width: 25%">dni</th>
                    <th style="width: 25%">nombres</th>
                    <th style="width: 25%">Primer Apellido</th>
                    <th style="width: 25%">Segundo Apellido</th>
                </tr>
                <tr>
                    <th><input type="text" id="dni_s" class="form-control" placeholder="buscar..."></th>
                    <th><input type="text" id="nombres_s" class="form-control" placeholder="buscar..."></th>
                    <th><input type="text" id="apellido1_s" class="form-control" placeholder="buscar..."></th>
                    <th><input type="text" id="apellido2_s" class="form-control" placeholder="buscar..."></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nombre de Usuario'); ?>
        <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'nombre'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'clave'); ?>
        <?php echo $form->textField($model,'clave',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'clave'); ?>
    </div>


    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-lg','id'=>'registro_usuario')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
