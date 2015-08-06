<?php
/* @var $this EvolucionEnfermeriaController */

$this->breadcrumbs=array(
	'Evolucion Enfermeria',
);

$this->pageTitle='Kardex de enfermeria';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>$modelInternacion->historial));?>
<nav class="navbar navbar-menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuHistoria" aria-expanded="false">
                <span class="sr-only">Opciones de historia</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menuHistoria">
            <ul class="nav navbar-nav">
                <li><?php echo CHtml::link('Datos generales',['internacion/index','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Nuevo diagnostico',['qweqw']);?></li>
                <li class="active"><?php echo CHtml::link('Kardex de enfermeria',['evolucionEnfermeria/showKardex','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Cambio de sala',['internacion/viewHistorialSalas','id'=>$modelInternacion->id_inter]);?></li>
                <li><?php echo CHtml::link('Servicios',['qweqw']);?></li>
                <li><?php echo CHtml::link('Examenes',['qweqw']);?></li>
                <li><?php echo CHtml::link('Alta',['internacion/altaMedica','id'=>$modelInternacion->id_inter]);?></li>
            </ul>
        </div>
    </div>
</nav>


<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-success">
            <div class="box-body">
                <?php echo CHtml::beginForm(['evolucionEnfermeria/createEvolucion'],'post',null);?>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="20%">FECHA DE REGISTRO</th>
                            <th width="20%">HORA DE REGISTRO</th>
                            <th width="30%"><?php echo CHtml::activeLabelEx($modelEvo,'respuesta_tratamiento')?></th>
                            <th width="30%"><?php echo CHtml::activeLabelEx($modelEvo,'dieta')?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php echo CHtml::activeHiddenField($modelEvo,'id_inter')?>
                            <td>
                                <?php echo date('d-m-Y');?>
                            </td>
                            <td>
                                <?php echo date('H:i');?>
                            </td>
                            <td>
                                <?php echo CHtml::activeTextField($modelEvo,'respuesta_tratamiento',['class'=>'form-control input-sm'])?>
                                <?php echo CHtml::error($modelEvo,'respuesta_tratamiento',['class'=>'label label-danger']);?>
                            </td>
                            <td>
                                <?php echo CHtml::activeTextField($modelEvo,'dieta',['class'=>'form-control input-sm'])?>
                                <?php echo CHtml::error($modelEvo,'dieta',['class'=>'label label-danger']);?>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                            </td>
                        </tr>

                        <?php foreach($modelInternacion->evolucion as $item):?>

                        <tr>
                            <td><?php echo date('d-m-Y',strtotime($item->fecha_evo_enf));?></td>
                            <td><?php echo date('H:i',strtotime($item->fecha_evo_enf));?></td>
                            <td><?php echo $item->respuesta_tratamiento;?></td>
                            <td><?php echo $item->dieta;?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php echo CHtml::endForm();?>
            </div>
        </div>
    </div>
</div>