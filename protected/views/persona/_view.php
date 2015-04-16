<?php
/* @var $this PersonaController */
/* @var $data Persona */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dni')); ?>:</b>
	<?php echo CHtml::encode($data->dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primer_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->primer_apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segundo_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->segundo_apellido); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br /><?php $paciente=Paciente::model()->findByPk($data->id)?>
        <div id="botondetallepaciente">
            <?php echo (!empty($paciente->id_paciente))?CHtml::link("Ver Detalle de Paciente",Yii::app()->createUrl('Persona/view',array('id'=>$data->id)),array('class'=>'btn btn-success')):CHtml::link("Registrar Paciente",Yii::app()->createUrl('Persona/update',array('id'=>$data->id)),array('class'=>'btn btn-danger')); ?>
        </div>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_civil')); ?>:</b>
	<?php echo CHtml::encode($data->estado_civil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->pais_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localidad')); ?>:</b>
	<?php echo CHtml::encode($data->localidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel_estudio')); ?>:</b>
	<?php echo CHtml::encode($data->nivel_estudio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais_vive')); ?>:</b>
	<?php echo CHtml::encode($data->pais_vive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
	<?php echo CHtml::encode($data->celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fotografia')); ?>:</b>
	<?php echo CHtml::encode($data->fotografia); ?>
	<br />

	*/ ?>
	</div>
</div>

