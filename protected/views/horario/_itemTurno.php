<?php
    $color=array('ACTIVO'=>'primary','INACTIVO'=>'danger');
    $inact=array('ACTIVO'=>'','INACTIVO'=>'disabled');
    $act=array('INACTIVO'=>'','ACTIVO'=>'disabled');
?>
<tr>
    <td><?php echo CHtml::encode($data->nombre_turno);?></td>
    <td><?php echo CHtml::encode($data->tipo_turno); ?></td>
    <td><?php echo date("h:i A", strtotime($data->hora_ingreso)); ?></td>
    <td><?php echo date("h:i A", strtotime($data->hora_salida));?></td>
    <td><?php echo CHtml::encode($data->tolerancia); ?></td>
    <td><span class="label label-<?php echo $color[$data->estado];?>"><?php echo CHtml::encode($data->estado); ?></span></td>
    <td>
        <div class="btn-group">
            <a href="<?php echo $this->createUrl('turno/cambiaEstado',array('id'=>$data->id_turno)); ?>" class="btn btn-primary btn-sm <?php echo $act[$data->estado]; ?>" title="Activar"><i class="fa fa-fw fa-check"></i></a>
            <a href="<?php echo $this->createUrl('turno/cambiaEstado',array('id'=>$data->id_turno)); ?>" class="btn btn-danger btn-sm <?php echo $inact[$data->estado]; ?>" title="Inactivar"><i class="fa fa-fw fa-times"></i></a>
        </div>
        <a href="<?php echo $this->createUrl('turno/update',array('id'=>$data->id_turno)); ?>" class="btn btn-primary btn-sm" title="Actualizar"><i class="fa fa-fw fa-edit"></i></a>
    </td>
</tr>

