<?php if($listaTratamiento!=null):?>
    <table class="table table-bordered table-striped" id="table-tratamiento">
        <thead>
        <tr>
            <th>Fecha de tratamiento</th>
            <th>Instrucciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($listaTratamiento as $itemT):?>
            <tr data-index="<?php echo $itemT->id_trat;?>">
                <td><?php echo $itemT->fecha_trat;?></td>
                <td><?php echo $itemT->instrucciones_trat;?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php else: ?>
    No se encontraron resultados
<?php endif;?>
