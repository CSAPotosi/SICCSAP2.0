
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$servicio,
    'attributes'=>array(
        'codigo_serv',
        'nombre_serv',
        'unidad_serv',
        'fecha_creacion',
        'fecha_actualizacion',
        'id_insti',
    ),
)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$precio,
    'attributes'=>array(
        'fecha_inicio',
        'monto',
    ),
)); ?>
