<tr>
    <td>
        <?php echo date('d/m/Y',strtotime($data->fecha_diagnostico)); ?>
    </td>
    <td>
        <?php echo date('h:i A',strtotime($data->fecha_diagnostico)); ?>
    </td>
    <td>
        <?php echo $data->diagnostico; ?>
    </td>
</tr>