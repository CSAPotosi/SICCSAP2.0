<table class="table table-hover bordered">
        <tr>
            <th>Nombre Especialidad</th>
            <th>Descripcion</th>
        </tr>
        <?php
        if($especialidad!=null){
            foreach($especialidad as $es){?>
                <tr>
                    <td><?php echo $es->nombre_especialidad?></td>
                    <td><?php echo $es->descripcion?></td>
                </tr>
            <?php }
        }?>
</table>