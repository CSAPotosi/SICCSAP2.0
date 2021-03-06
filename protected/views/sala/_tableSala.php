<?php
    $colors=array('','blue','green','yellow','red');
?>
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control input-sm" placeholder="Buscar sala" id="searchSala"/>
        <span class="input-group-addon bg-blue-gradient"><i class="fa fa-search"></i></span>
    </div>
</div>
<?php echo CHtml::hiddenField('id_tipo_sala',$id_tipo_sala);?>
<?php if($listaSala != null):?>
<table class="table table-hover table-bordered dataTable" id="tableSala">
    <thead>
    <th>Nro.</th>
    <th class="text-center">Estado</th>
    <th class="button-column">Opciones</th>
    </thead>
    <tbody>
        <?php foreach($listaSala as $item):?>
            <tr class="<?php echo ($item->estado_sala==4)?'danger':'';?>">
                <td><?php echo $item->numero_sala; ?></td>
                <td class="text-center"> <span class="badge bg-<?php echo $colors[$item->estado_sala];?>"><?php echo $item->stateString;?></span></td>
                <td class="button-column text-center">
                    <?php echo CHtml::link('<i class="fa fa-th-list"></i>',array('sala/viewDetailSalaAjax',"id_sala"=>$item->id_sala),array('class'=>'btnVerSala','title'=>'Ver detalle'));?>
                    <?php echo ($item->estado_sala!=4)?CHtml::link('<i class="fa fa-edit"></i>',array('sala/renderFormSalaAjax',"id_sala"=>$item->id_sala),array('class'=>'btnUpdSala','title'=>'editar sala')):'';?>
                    <?php
                        $actives=array("","","","");
                        $actives[$item->estado_sala-1]="disabled";
                        $buttonGroup= '<div class="btn-group-vertical btn-group-xs">'.
                        CHtml::link("A",array('sala/changeStateSalaAjax','id'=>$item->id_sala,'state'=>1),array('class'=>'changeStateSala btn btn-primary btn-xs '.$actives[0],'title'=>'Activar')).
                        CHtml::link("M",array('sala/changeStateSalaAjax','id'=>$item->id_sala,'state'=>3),array('class'=>'changeStateSala btn bg-yellow btn-xs '.$actives[2],'title'=>'Mantenimiento')).
                        CHtml::link("I",array('sala/changeStateSalaAjax','id'=>$item->id_sala,'state'=>4),array('class'=>'changeStateSala btn btn-danger btn-xs '.$actives[3],'title'=>'Inactivar')).
                        '</div>';
                    ?>
                    <?php echo ($item->estado_sala!=2)?CHtml::link('<i class="fa fa-toggle-up"></i>',array(''),array('class'=>'btnStatusSala','data-trigger'=>'focus','data-html'=>'true','data-content'=>"$buttonGroup")):'';?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php else:?>
    No se Encontraron resultados
<?php endif;?>
