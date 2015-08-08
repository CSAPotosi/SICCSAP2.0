<?php
/* @var $this LaboratorioController */
$this->pageTitle='Lista de parametros disponibles';
$this->breadcrumbs=array(
	'Parametros laboratorio',
);

$options=[
    1=>['ACTIVO','bg-blue'],
    0=>['INACTIVO','bg-red']
]

?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Parametro</th>
                            <th>Unidad</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaParametros as $itemP):?>
                            <tr>
                                <td><?php echo $itemP->nombre_par_lab;?></td>
                                <td><?php echo $itemP->unidad_par_lab;?></td>

                                <td><span class="label <?php echo $options[$itemP->estado_par_lab][1];?>"><?php echo $options[$itemP->estado_par_lab][0];?></span></td>
                                <td>
                                    <?php
                                        $actives=array("","");
                                        $actives[$itemP->estado_par_lab]="disabled";
                                        $buttonGroup= '<div class="btn-group-vertical btn-group-xs">'.
                                        CHtml::link("A",array('laboratorio/changeStateParametro','id'=>$itemP->id_par_lab,'state'=>1),array('class'=>'changeStateSala btn btn-primary btn-xs '.$actives[1],'title'=>'Activar')).
                                        CHtml::link("I",array('laboratorio/changeStateParametro','id'=>$itemP->id_par_lab,'state'=>0),array('class'=>'changeStateSala btn btn-danger btn-xs '.$actives[0],'title'=>'Inactivar')).
                                        '</div>';
                                    ?>

                                    <?php echo CHtml::link('<i class="fa fa-eye"></i>',['laboratorio/viewParametro','id'=>$itemP->id_par_lab],['title'=>'Ver detalle']);?>
                                    <?php echo CHtml::link('<i class="fa fa-toggle-up"></i>',array(''),array('class'=>'btnStatusParamatro','data-trigger'=>'focus','data-html'=>'true','data-content'=>"$buttonGroup"));?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Nuevo parametro',['createParametro'],['class'=>'btn btn-primary'])?>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScript('ajax','
        $(".btnStatusParamatro").popover({
            content:"contenido",
            placement:"top",
        });
        $(".btnStatusParamatro").on("click",function(){ return false;});
    ');
?>