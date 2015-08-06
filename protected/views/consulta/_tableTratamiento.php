<?php if($listaTratamiento!=null):?>
    <table class="table table-bordered table-striped table-hover" id="table-tratamiento">
        <thead>
        <tr>
            <th>Fecha y hora de tratamiento</th>
            <th>Instrucciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($listaTratamiento as $itemT):?>
            <tr data-index="<?php echo $itemT->id_trat;?>">
                <td width="40%"><?php echo date('d-m-Y H:i',strtotime($itemT->fecha_trat));?></td>
                <td width="60%"><?php echo $itemT->instrucciones_trat;?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php else: ?>
    No se encontraron resultados
<?php endif;?>
