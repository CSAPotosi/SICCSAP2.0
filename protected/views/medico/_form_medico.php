<div class="callout callout-info">
    <h4>Medico</h4>
    <?php $mediconombre=Persona::model()->findByPk($id)?>
    <p><?php echo $mediconombre->nombreCompleto;?></p>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>($medico->isNewRecord ?'medico-espe-form':'medico-espe-update'),
    'action'=>($medico->isNewRecord ? yii::app()->createUrl("medico/CrearMedicoEspe"):yii::app()->createUrl("medico/UpdateMedicoEspe")),
    'enableAjaxValidation'=>false,
)); ?>
<input type="hidden" name="Medico[id]" value="<?php echo $id?>">
<div class="form-group">
    <?php echo $form->labelEx($medico,'Matricula'); ?>
    <?php echo $form->textField($medico,'matricula',array('class'=>'form-control','placeholder'=>'Matricula del medico')); ?>
    <?php echo $form->error($medico,'matricula',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($medico,'Colegiatura'); ?>
    <?php echo $form->textField($medico,'colegiatura',array('class'=>'form-control','placeholder'=>'Matricula del medico')); ?>
    <?php echo $form->error($medico,'colegiatura',array('class'=>'label label-danger')); ?>
</div>
<div class="form-group">
 <label>Especialidades Asignadas</label>
<?php
    $persona=Persona::model()->findByPk($id);
    if($persona->medico!=null){?>
        <table class="table table-condensed">
            <tr>
                <th>Nombre Especialidad</th>
                <th>Descripcion</th>
                <th >Quitar</th>
            </tr>
            <?php
            $listaEspeMedi=MedicoEspecialidad::model()->findAll(array(
                'condition'=>"id_medico='{$id}'",
            ));
            foreach($listaEspeMedi as $list):?>
                <tr class="asignados">
                    <input type="hidden" value="<?php echo $list->idEspecialidad->id_especialidad?>">
                    <td ><?php echo $list->idEspecialidad->nombre_especialidad?></td>
                    <td ><?php echo $list->idEspecialidad->descripcion?></td>
                    <td><?php echo ($medico->isNewRecord!=null ? "": CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('medico/QuitarEspecialidad','id'=>$list->id_m_e,'id_medico'=>$medico->id),array('title'=>'Quitar')))?></td>
                </tr>
            <?php endforeach?>
        </table>
    <?php }
?>
</div>
<?php ?>
<div class="form-group">
    <label>Especialidades para Asignar</label>
    <div class="box box-solid">
        <table class="table table-hover bordered" id="lista_especialidades">
            <tr>
                <th>Nombre Especialidad</th>
                <th>Descripcion</th>
                <th>Estado</th>
            </tr>
        </table>
    </div>
</div>
<?php echo ($medico->isNewRecord ?CHtml::button('Guardar Datos', array('id' =>'btnmedicoespe','class'=>'btn bg-red-gradient')):CHtml::button('Actulizar Datos', array('id' =>'btnmedicoespeupd','class'=>'btn bg-red-gradient'))); ?>
<?php $this->endWidget(); ?>