
<tr>
    <td><?php echo CHtml::encode($data->nombre_turno);?></td>
    <td><?php echo CHtml::encode($data->tipo_turno); ?></td>
    <td><?php echo date("h:i A", strtotime($data->hora_ingreso)); ?></td>
    <td><?php echo date("h:i A", strtotime($data->hora_salida));?></td>
    <td><?php echo CHtml::encode($data->tolerancia); ?></td>
    <td>
        <a href="<?php echo $this->createUrl('turno/update',array('id'=>$data->id_turno)); ?>" class="btn btn-primary btn-sm" title="Actualizar"><i class="fa fa-fw fa-edit"></i></a>
    </td>
</tr>

