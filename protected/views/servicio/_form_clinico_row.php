<table class="table table-hover bordered" id="tablagab">
    <tr>
        <th>Codigo Categoria</th>
        <th>Nombre Categoria</th>
        <th>Opciones</th>
    </tr>
    <?php foreach($listclinico as $list):
        if($list->nombre_cat_cli!="enfermeria"){?>
        <tr>
            <td><?php echo $list->codigo_cat_cli;?></td>
            <td><?php echo $list->nombre_cat_cli;?></td>
            <td>
                <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('servicio/updatecli','id'=>$list->id_cat_cli),array('title'=>'actualizar','class'=>'btnUpdcli'))?>
                <?php echo ($list->servicioClinicos!=null ? "": CHtml::link('<i class="glyphicon glyphicon-remove"></i>',array('servicio/deletecli','id'=>$list->id_cat_cli),array('title'=>'eliminar','class'=>'btnDelcli')))?>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <?php echo CHtml::link('<i class="fa fa-folder-open"></i>',array('servicio/itemcli','id'=>$list->id_cat_cli),array('title'=>'Ver items','class'=>'btnItemcli'))?>
            </td>
        </tr>
    <?php }endforeach?>
</table>