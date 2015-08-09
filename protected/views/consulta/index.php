<?php
$this->pageTitle=CHtml::link('<i class="fa fa-arrow-left"></i>',['historialPaciente/view','id'=>$his]).' Consulta';
?>

<?php $this->renderPartial('/historialPaciente/_form_datos_paciente',array('model'=>HistorialPaciente::model()->findByPk($his)));?>

<?php if($consulta_id!=0)
        echo CHtml::link('tratamiento',['consulta/viewTratamiento','consulta_id'=>$consulta_id]);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">Informacion de consulta</h3>
            </div>
            <div class="box-body">
                <?php
                if($consulta_id==0)
                    $this->renderPartial('_formConsulta',array('consultaModel'=>$consultaModel,'listaSV'=>$listaSV,'listaCie'=>$listaCie));
                else
                    $this->renderPartial('_detalleConsulta',array('detalleConsulta'=>$consultaModel,'listaCie'=>$listaCie));
                ?>
            </div>
        </div>
    </div>
</div>

<!--
<div class="row">
    <div class="col-md-12">
        <ul id="tabsPersona" class="nav nav-tabs" role="tab-panel">
            <li role="presentation" ><a href="#antecedente" id="antecedente-tab" role="tab" data-toggle="tab" aria-controls="antecedente" aria-expanded="false">Antecedentes Medicos</a></li>
            <li role="presentation" class="active"><a href="#consulta" id="consulta-tab" role="tab" data-toggle="tab" aria-controls="consulta" aria-expanded="false">Consulta</a></li>
            <li role="presentation" class="especial <?php /*echo ($consulta_id==0)?'hide':'show';*/ ?>"><a href="#receta" id="receta-tab" role="tab" data-toggle="tab" aria-controls="receta" aria-expanded="false">Tratamientos y evolucion</a></li>
        </ul>
        <div id="tabcontent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="antecedente" aria-labelledby="antecedente-tab">
                <div class="box box-solid box-primary">
                    <div class="modal fade bs-example-modal-lg" id="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <?php/* $this->renderPartial('/Consulta/_form_tipo_antecedente',array('TipoAntecedente'=>$TipoAntecedente,'consultaModel'=>$consultaModel,'genero'=>$genero));*/?>
                            </div>
                        </div>
                    </div>
                    <?php /*$this->renderPartial('Antecedentes',array('listaante'=>$listaante,'listaAntecedenteMedico'=>$listaAntecedenteMedico,'AntecedenteMedico'=>$AntecedenteMedico,'his'=>$his))*/?>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="consulta" aria-labelledby="consulta-tab">
                <div class="box box-solid" id="box-consulta">
                    <div class="box-body" id="contenedor-consulta">
                        <?php/*
                            if($consulta_id==0)
                                $this->renderPartial('_formConsulta',array('consultaModel'=>$consultaModel,'listaSV'=>$listaSV));
                            else
                                $this->renderPartial('_detalleConsulta',array('detalleConsulta'=>$consultaModel));
                        */?>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade especial <?php /*echo ($consulta_id==0)?'hide':''; */?>" id="receta" aria-labelledby="receta-tab">
                <div class="box box-solid">
                    <div class="box-body">
                        <?php/*
                            if($consulta_id!=0)
                                $this->renderPartial('_tratamiento',['modelConsulta'=>Consulta::model()->findByPk($consulta_id)]);
                       */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->