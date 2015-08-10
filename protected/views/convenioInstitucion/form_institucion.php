<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['persona/index'])." Pagina de Inicio";
$this->breadcrumbs=array(
    'Instituciones',
);
?>
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="row">
            <div class="box box-primary box-solid">
                <div class="box-header">
                    Instituciones o Empresas
                </div>
                <div class="box-body">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3>Registrar Nueva Institucion</h3>
                        </div>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'form-institucion',
                            'enableAjaxValidation'=>false,
                            'action'=>($institucion->isNewRecord ? yii::app()->createUrl("ConvenioInstitucion/CrearInstitucion"):yii::app()->createUrl("/ConvenioInstitucion/ActualizarInstitucion",array('id'=>$institucion->id_insti))),
                        ));?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($institucion,'Institucion'); ?>
                                        <?php echo $form->textField($institucion,'nombre',array('class'=>'form-control','placeholder'=>'Nombre de la Institucion')); ?>
                                        <?php echo $form->error($institucion,'nombre',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($institucion,'Direccion'); ?>
                                        <?php echo $form->textField($institucion,'direccion',array('class'=>'form-control','placeholder'=>'Direccion de la Institucion')); ?>
                                        <?php echo $form->error($institucion,'direccion',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($institucion,'Telefono'); ?>
                                        <?php echo $form->textField($institucion,'telefono',array('class'=>'form-control','placeholder'=>'Telefono de la Institucion')); ?>
                                        <?php echo $form->error($institucion,'telefono',array('class'=>'label label-danger')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <?php echo CHtml::Button($institucion->isNewRecord ? 'Guardar Institucion' : 'Actualizar Institucion',array('class'=>"btn btn-primary",'id'=>'btn_institucion')); ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6"><h3>Instituciones Registradas</h3></div>
                                    <div class="col-md-6">
                                        <div class="input-group margin pull-right">
                                            <input class="form-control" type="text" id="buscarinstitucion" placeholder="Burcar Instituciones">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-float btn-primary" type="button"><i class="fa fa-fw fa-search"></i></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="Layer1" style="height:300px; overflow: scroll;">
                                    <table class="table table-hover bordered">
                                        <tr>
                                            <th>Institucion</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Opciones</th>
                                        </tr>
                                        <?php foreach($listainstitucion as $list):?>
                                            <tr data-nombre="<?php echo $list->nombre?>" class="valor">
                                                <td><?php echo $list->nombre?></td>
                                                <td><?php echo $list->direccion?></td>
                                                <td><?php echo $list->telefono?></td>
                                                <td>
                                                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('ConvenioInstitucion/ActualizarInstitucion','id'=>$list->id_insti),array('title'=>'Actualizar','class'=>'btnupdinsti'))?>
                                                    <?php if($list->servicios==null and $list->convenioInstitucions==null){?>
                                                    <?php echo CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('ConvenioInstitucion/EliminarInstitucion','id'=>$list->id_insti),array('title'=>'Eliminar','class'=>'btndelinsti'))?>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('form_institucion','
$(function(){
    $("#btn_institucion").on("click",function(){
        $("#form-institucion").submit();
    })
    $("#buscarinstitucion").on("keyup",function(){
        var texto=$(this).val();
        if(texto.length>0){
        $(".valor").addClass("hide");
        $(".valor[data-nombre*=\'"+texto+"\']").removeClass("hide")
        }
        else{
            $(".valor").removeClass("hide");
        }
    })
});

',CClientScript::POS_END);
?>