<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nro.</th>
        <th>Tipo</th>
        <th>Fecha entrada</th>
        <th>Fecha salida</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($listaSalas as $itemSala):?>
        <tr <?php echo ($itemSala->fecha_salida==null)?'class="bg-green"':'';?>>
            <td><?php echo $itemSala->sala->numero_sala;?></td>
            <td><?php echo $itemSala->sala->tipoSala->servicio->nombre_serv;?></td>
            <td><?php echo $itemSala->fecha_entrada;?></td>
            <td><?php echo $itemSala->fecha_salida;?></td>
            <td class="text-center"><?php echo CHtml::link('<i class="fa fa-print"></i>',['internacion/reporteChangeSala','id_inter'=>$itemSala->id_inter,'id_sala'=>$itemSala->id_sala,'fecha_entrada'=>$itemSala->fecha_entrada],['title'=>'Imprimir reporte','class'=>'btn btn-success bg-green']);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>