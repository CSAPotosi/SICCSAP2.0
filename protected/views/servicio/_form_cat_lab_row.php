<table class="table table-hover bordered" id="tablalab">
    <tr>
        <th>Codigo Categoria</th>
        <th>Nombre Categoria</th>
        <th>Opciones</th>
    </tr>
    <?php foreach($listcalab as $list):?>
        <tr>
            <td><?php echo $list->codigo_cat_lab;?></td>
            <td><?php echo $list->nombre_cat_lab;?></td>
            <td>
                <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/updatecatlab','id'=>$list->id_cat_lab),array('title'=>'actualizar','class'=>'btnUpdcatlab'))?>
                <?php echo ($list->examenLaboratorios!=null ? "": CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deletecatlab','id'=>$list->id_cat_lab),array('title'=>'eliminar','class'=>'btnDelcatlab')))?>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <?php echo CHtml::link('<i class="fa fa-folder-open"></i>',array('servicio/itemcatlab','id'=>$list->id_cat_lab),array('title'=>'Ver items','class'=>'btnItematlab'))?>
            </td>
        </tr>
    <?php endforeach?>
</table>