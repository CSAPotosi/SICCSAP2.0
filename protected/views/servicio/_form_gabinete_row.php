<table class="table table-hover bordered" id="tablagab">
    <tr>
        <th>Codigo Categoria</th>
        <th>Nombre Categoria</th>
        <th>Opciones</th>
    </tr>
    <?php foreach($listgabinete as $list):?>
        <tr>
            <td><?php echo $list->codigo_cat_gab;?></td>
            <td><?php echo $list->nombre_cat_gab;?></td>
            <td>
                <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/updategab','id'=>$list->id_cat_gab),array('title'=>'actualizar','class'=>'btnUpdgab'))?>
                <?php echo ($list->examenGabinetes!=null ? "": CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deletegab','id'=>$list->id_cat_gab),array('title'=>'eliminar','class'=>'btnDelgab')))?>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <?php echo CHtml::link('<i class="fa fa-folder-open"></i>',array('servicio/itemgab','id'=>$list->id_cat_gab),array('title'=>'Ver items','class'=>'btnItemgab'))?>
            </td>
        </tr>
    <?php endforeach?>
</table>