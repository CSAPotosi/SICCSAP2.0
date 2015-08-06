<?php
/* @var $this CuentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuentas',
);

$this->menu=array(
	array('label'=>'Create Cuenta', 'url'=>array('create')),
	array('label'=>'Manage Cuenta', 'url'=>array('admin')),
);
?>

<h1>Cuentas</h1>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <?php
            //var_dump($cPrincipales);
            //Yii::app()->end();
            echo "<li class='active'><a href='#Cuentas' data-toggle='tab'>Todas Las Cuentas</a></li>";
            foreach($cPrincipales as $valor)
            {
                echo "<li><a href=#$valor->nombre data-toggle='tab'>$valor->nombre</a></li>";
            }
            ?>
        </ul>
        <div id="tabcontent" class="tab-content">

            <div class='tab-pane active' id='Cuentas'>
            <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'cuenta-grid',
                'dataProvider'=>$totalCuentas,
                //'filter'=>$totalCuentas,
                //'rowCssClassExpression'=>'$data->getcssclass()',
                'columns'=>array(
                    'codigo:text:Código',
                    'nombre:text:Nombre',
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Operaciones',
                        'template'=>'{ver}{actualizar}{borrar}',
                        'buttons'=>array(
                            'ver'=>array(
                                'label'=>'<i class="fa fa-fw fa-search"></i>|',
                                'options'=>array('title'=>'Ver Detalles','class'=>''),
                                'url'=>'Yii::app()->createUrl("cuenta/view",array("id"=>$data->id_cuenta))',
                            ),
                            'actualizar'=>array(
                                'label'=>'<i class="fa fa-fw fa-pencil"></i>|',
                                'options'=>array('title'=>'Actualizar','class'=>''),
                                'url'=>'Yii::app()->createUrl("cuenta/update",array("id"=>$data->id_cuenta))',
                            ),
                            'borrar'=>array(
                                'label'=>'<i class="fa fa-fw fa-times"></i>',
                                'options'=>array('title'=>'Eliminar','class'=>''),
                                'url'=>'Yii::app()->createUrl("cuenta/borrar",array("id"=>$data->id_cuenta))',
                                'click'=>'function(){alert("eliminado");}',
                            ),
                        ),
                    ),
                    array(
                        'class'=>'CLinkColumn',
                        'header'=>'Subcuenta',
                        'label'=>'<span class="label label-info">CREAR SUBCUENTA</span>',
                        //'urlExpression'=>'"?r=cuenta/create&id=".$data->codigo',
                    ),
                )
                //'itemView'=>'_view',
                ));
            ?>
            </div>

            <?php
            foreach($cPrincipales as $valor)
            {
                echo "<div class='tab-pane' id='$valor->nombre'>";

                $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$cuentas[$valor->nombre],
                //'rowCssClassExpression'=>'$data->getcssclass()',
                'columns'=>array(
                    'codigo:text:Código',
                    'nombre:text:nombre',
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Operaciones',
                        'template'=>'{ver}{actualizar}{borrar}',
                        'buttons'=>array(
                            'ver'=>array(
                                'label'=>'<i class="fa fa-fw fa-search"></i>|',
                                'options'=>array('title'=>'Ver Detalles','class'=>''),
                                'url'=>'Yii::app()->createUrl("cuenta/view",array("id"=>$data->id_cuenta))',
                            ),
                            'actualizar'=>array(
                                'label'=>'<i class="fa fa-fw fa-pencil"></i>|',
                                'options'=>array('title'=>'Actualizar','class'=>''),
                                'url'=>'Yii::app()->createUrl("cuenta/update",array("id"=>$data->id_cuenta))',
                            ),
                            'borrar'=>array(
                                'label'=>'<i class="fa fa-fw fa-times"></i>',
                                'class'=>'borrar',
                                'options'=>array('title'=>'Eliminar','class'=>''),
                                //'url'=>'Yii::app()->createUrl("cuenta/borrar",array("id"=>$data->id_cuenta))',
                            ),
                        ),
                    ),
                    array(
                        'class'=>'CLinkColumn',
                        'label'=>'SubCuenta',
                        'urlExpression'=>'"?r=cuenta/create&id=".$data->codigo',
                        'header'=>''
                    ),
                )
                //'itemView'=>'_view',
                ));
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>



