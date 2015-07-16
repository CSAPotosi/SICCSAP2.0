<table class="table table-hover bordered" id="contenedor_lista">
        <tr>
            <th>Nombre Especialidad</th>
            <th>Descripcion</th>
            <th>Opciones</th>
            <th>Estado</th>
        </tr>

        <?php
        if($listaespecialidad!=null){
            foreach($listaespecialidad as $es){?>

                <tr class="val" id="<?php echo $es->id_especialidad?>">
                    <input type="hidden" value="<?php echo $es->id_especialidad?>">
                    <td><?php echo $es->nombre_especialidad?></td>
                    <td>
                        <?php echo $es->descripcion?>
                        <input type="hidden" name="MedicoEspecialidad[<?php echo $es->id_especialidad;?>][id_especialidad]" value="<?php echo $es->id_especialidad;?>">
                    </td>
                    <td name="ocultar">
                        <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('medico/VerEspecialidad','id'=>$es->id_especialidad),array('title'=>'actualizar','class'=>'btnUpdateespecialidad'))?>
                    </td>
                    <td>
                        <input type="checkbox" class="EspeCheck" value="<?php echo $es->id_especialidad?>">
                    </td>
                </tr>

            <?php }
        }?>

</table>