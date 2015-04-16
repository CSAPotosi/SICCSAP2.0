<select multiple class="form control" disabled>
    <?php
    foreach($listaAntecedenteMedico as $medico){?>
        <option><?php echo $medico->descripcion_ant;?></option>
    <?php}
    ?>
</select>