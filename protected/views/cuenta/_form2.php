<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<?php Yii::app()->clientScript->registerScript('cuentas','
    $(".radio").on("ifChecked",function(){
        switch($(this).val())
        {
            case "1":$("#nivel_1").prop("disabled","disabled");$("#nivel_2").prop("disabled","disabled");$("#nivel_3").prop("disabled","disabled");$("#nivel_4").prop("disabled","disabled");$("#nivel_5").prop("disabled","disabled");$("#Cuenta_codigo").prop("maxlength","1");$("#Cuenta_codigo").prop("placeholder","-");break;
            case "2":$("#nivel_1").prop("disabled","");$("#nivel_2").prop("disabled","disabled");$("#nivel_3").prop("disabled","disabled");$("#nivel_4").prop("disabled","disabled");$("#nivel_5").prop("disabled","disabled");$("#Cuenta_codigo").prop("maxlength","2");$("#Cuenta_codigo").prop("placeholder","- -");break;
            case "3":$("#nivel_1").prop("disabled","");$("#nivel_2").prop("disabled","");$("#nivel_3").prop("disabled","disabled");$("#nivel_4").prop("disabled","disabled");$("#nivel_5").prop("disabled","disabled");$("#Cuenta_codigo").prop("maxlength","3");$("#Cuenta_codigo").prop("placeholder","- - -");break;
            case "4":$("#nivel_1").prop("disabled","");$("#nivel_2").prop("disabled","");$("#nivel_3").prop("disabled","");$("#nivel_4").prop("disabled","disabled");$("#nivel_5").prop("disabled","disabled");$("#Cuenta_codigo").prop("maxlength","5");$("#Cuenta_codigo").prop("placeholder","- - - - -");break;
            case "5":$("#nivel_1").prop("disabled","");$("#nivel_2").prop("disabled","");$("#nivel_3").prop("disabled","");$("#nivel_4").prop("disabled","");$("#nivel_5").prop("disabled","disabled");$("#Cuenta_codigo").prop("maxlength","7");$("#Cuenta_codigo").prop("placeholder","- - - - - - -");break;
            case "6":$("#nivel_1").prop("disabled","");$("#nivel_2").prop("disabled","");$("#nivel_3").prop("disabled","");$("#nivel_4").prop("disabled","");$("#nivel_5").prop("disabled","");$("#Cuenta_codigo").prop("maxlength","9");$("#Cuenta_codigo").prop("placeholder","- - - - - - - - -");break;
        };
    });


    $(".nivel").on("change",function(){
        var id=$(this).attr("next");
        $.ajax({
            url:"'.CHtml::normalizeUrl(array("cuenta/getSubcuenta")).'",
            type:"POST",
            data:{nivel:$(this).val()},
            //update:"#nivel_2",
            success:function(datos){
                $(id).html(datos);
            }
        });
        $.ajax({
            url:"'.CHtml::normalizeUrl(array("cuenta/getnumcuenta")).'",
            type:"POST",
            data:{cod:$(this).val()},
            success:function(datos){
                $("#Cuenta_codigo").val(datos);
            }
        });
    });


');?>


<div class="form">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">
                        Crear Cuenta
                    </h3>
                </div>
                <div class="box-body">


                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'cuenta-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                    )); ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <?php echo $form->errorSummary($model); ?>


                    <div class="row">
                        <?php
                        /*$htmlOptions=array(
                            "ajax"=>array(
                                "url"=>$this->createUrl('getSubcuenta'),
                                "type"=>"POST",
                                "update"=>"#nivel_2",
                            ),
                            'id'=>"nivel_1",
                        );*/
                        ?>
                        <div class="col-md-12">
                            <p><strong>Indique el tipo de cuenta a crear</strong></p>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <label for="clase" class="control-label">Clase</label>
                                        </div>
                                        <div class="row text-center">
                                            <?php echo CHtml::radioButton('radio','checked:true',array('class'=>'radio','value'=>'1','id'=>'clase')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <label for="grupo" class="control-label">Grupo</label>
                                        </div>
                                        <div class="row text-center">
                                            <?php echo CHtml::radioButton('radio',null,array('class'=>'radio','value'=>'2','id'=>'grupo')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <label for="subgrupo" class="control-label">SubGrupo</label>
                                        </div>
                                        <div class="row text-center">
                                            <?php echo CHtml::radioButton('radio',null,array('class'=>'radio','value'=>'3','id'=>'subgrupo')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <label for="cuenta" class="control-label">Cuenta</label>
                                        </div>
                                        <div class="row text-center">
                                            <?php echo CHtml::radioButton('radio',null,array('class'=>'radio','value'=>'4','id'=>'cuenta')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <label for="subcuenta" class="control-label">Subcuenta</label>
                                        </div>
                                        <div class="row text-center">
                                            <?php echo CHtml::radioButton('radio',null,array('class'=>'radio','value'=>'5','id'=>'subcuenta')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <label for="auxiliar" class="control-label">Auxiliar</label>
                                        </div>
                                        <div class="row text-center">
                                            <?php echo CHtml::radioButton('radio',null,array('class'=>'radio','value'=>'6','id'=>'auxiliar')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'codigo'); ?>
                                <?php echo $form->textField($model,'codigo',array('size'=>12,'maxlength'=>1,'class'=>'form-control input-large input-lg','placeholder'=>'-')); ?>
                                <?php echo $form->error($model,'codigo',array('class'=>'label label-danger')); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <?php echo CHtml::dropDownList('nivel_1',null,$model->getCuenta(),array("class"=>"nivel input-sm col-md-2 form-control","next"=>"#nivel_2",'disabled'=>'disabled','empty'=>'-- CLASE DE CUENTA --')); ?>
                                <?php echo CHtml::dropDownList('nivel_2',null,array("1"=>"______"),array("class"=>"nivel input-sm col-md-2 form-control","next"=>"#nivel_3",'disabled'=>'disabled')); ?>
                                <?php echo CHtml::dropDownList('nivel_3',null,array("1"=>"______"),array("class"=>"nivel input-sm col-md-2 form-control","next"=>"#nivel_4",'disabled'=>'disabled')); ?>
                                <?php echo CHtml::dropDownList('nivel_4',null,array("1"=>"______"),array("class"=>"nivel input-sm col-md-2 form-control","next"=>"#nivel_5",'disabled'=>'disabled')); ?>
                                <?php echo CHtml::dropDownList('nivel_5',null,array("1"=>"______"),array("class"=>"nivel input-sm col-md-2 form-control",'disabled'=>'disabled')); ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'nombre'); ?>
                        <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>120,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'nombre'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'moneda'); ?>
                        <?php echo $form->dropDownList($model,'moneda',CHtml::listData(Moneda::model()->findAll(),'id_moneda','sigla'),array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'moneda'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model,'descripcion'); ?>
                        <?php echo $form->textArea($model,'descripcion',array('size'=>200,'maxlength'=>200,'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'descripcion'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
                    </div>



                    <?php $this->endWidget(); ?>
                </div>
            </div>

        </div>
    </div>

</div><!-- form -->