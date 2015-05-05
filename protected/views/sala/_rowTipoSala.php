<?php
$this->widget('zii.widgets.grid.CGridView',array(
    'id'=>'gridTipoSala',
    'dataProvider'=>$listaTipoSala,
    'itemsCssClass'=>'table table-hover table-bordered dataTable',
    'columns'=>array(
        array('name'=>'Nombre','value'=>'$data->servicio->nombre_serv'),
        array('name'=>'Descripcion','value'=>'$data->descripcion_tipo_sala'),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{detalle}{actualizar}{eliminar}',
            'buttons'=>array(
                'detalle'=>array(
                    'label'=>'<i class="fa fa-folder-open"></i>',
                    'options'=>array('title'=>'Ver Detalle','class'=>'btnVerTipoSala'),
                    'url'=>'Yii::app()->createUrl("sala/view",array("id"=>$data->id_tipo_sala))',
                ),
                'actualizar'=>array(
                    'label'=>'<i class="fa fa-edit"></i>',
                    'options'=>array('title'=>'Editar','class'=>'btnUpdTipoSala'),
                    'url'=>'Yii::app()->createUrl("sala/create",array("id"=>$data->id_tipo_sala))',
                ),
                'eliminar'=>array(
                    'label'=>'<span class="glyphicon glyphicon-remove"></span>',
                    'options'=>array('title'=>'Eliminar','class'=>'btnDelTipoSala'),
                    'visible'=>'(!$data->salas)'
                ),
            )
        )
    ),
));
?>
