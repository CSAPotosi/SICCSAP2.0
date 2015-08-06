<?php
/* @var $this ConvenioInstitucionController */
/* @var $data ConvenioInstitucion */
?>

<div class="box box-solid box-primary">
	<div class="box-header">
        <h3 class="box-title">	<?php echo CHtml::link(CHtml::encode($data->id_convenio), array('view', 'id'=>$data->id_convenio)); ?>
	<br />

</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_convenio')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_convenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_insti')); ?>:</b>
	<?php echo CHtml::encode($data->id_insti); ?>
	<br />

	</div>
</div>

