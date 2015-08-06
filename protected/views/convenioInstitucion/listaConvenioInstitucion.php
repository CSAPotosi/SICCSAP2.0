<div id="Layer1" style="height:200px; overflow: scroll;">
    <table class="table table-hover bordered">
        <tr>
            <th>Convenio Institucional</th>
            <th>Institucion</th>
            <th>Opciones</th>
        </tr>
        <?php foreach($listaconvenioinsti as $list):?>
            <tr data-nombre="<?php echo $list->nombre_convenio?>" class="valor">
                <td><?php echo $list->nombre_convenio?></td>
                <td><?php echo $list->idInsti->nombre?></td>
                <td>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>',array('/ConvenioInstitucion/ActualizarConvenioInstitucion','id'=>$list->id_convenio),array('title'=>'Actualizar'))?>
                    <?php echo CHtml::link('<i class="fa fa-fw fa-list-ul"></i>',array('ConvenioInstitucion/VerServiciosConvenio','id'=>$list->id_convenio),array('title'=>'Ver servicios','class'=>'btnConvenioServicios'))?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>