<div class="row">
    <div class="col-md-12">
        <ul id="tabsPersona" class="nav nav-tabs" role="tab-panel">
            <li role="presentation" ><a href="#antecedente" id="antecedente-tab" role="tab" data-toggle="tab" aria-controls="antecedente" aria-expanded="false">Antecedentes Medicos</a></li>
            <li role="presentation" class="active"><a href="#consulta" id="consulta-tab" role="tab" data-toggle="tab" aria-controls="consulta" aria-expanded="false">Consulta</a></li>
            <li role="presentation" class="especial <?php echo ($consulta_id==0)?'hide':'show'; ?>"><a href="#reconsulta"  id="reconsulta-tab" role="tab" data-toggle="tab" aria-controls="reconsulta" aria-expanded="false">Reconsultas</a></li>
            <li role="presentation" class="especial <?php echo ($consulta_id==0)?'hide':'show'; ?>"><a href="#receta" id="receta-tab" role="tab" data-toggle="tab" aria-controls="receta" aria-expanded="false">Recetas</a></li>
        </ul>
        <div id="tabcontent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="antecedente" aria-labelledby="antecedente-tab">
                <div class="box box-solid">
                    <div class="box-body">
                        qwewqeq

                    </div>

                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="consulta" aria-labelledby="consulta-tab">
                <div class="box box-solid" id="box-consulta">
                    <div class="box-body" id="contenedor-consulta">
                        <?php
                            if($consulta_id==0)
                                $this->renderPartial('_formConsulta',array('consultaModel'=>$consultaModel,'listaSV'=>$listaSV));
                            else
                                $this->renderPartial('_detalleConsulta',array('detalleConsulta'=>$consultaModel));
                        ?>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade especial <?php echo ($consulta_id==0)?'hide':''; ?>" id="reconsulta" aria-labelledby="reconsulta-tab">
                <div class="box box-solid">
                    <div class="box-body">
                        <?php $this->renderPartial('_reconsulta');?>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade especial <?php echo ($consulta_id==0)?'hide':''; ?>" id="receta" aria-labelledby="receta-tab">
                <div class="box box-solid">
                    <div class="box-body">
                        hola mundo 12312
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>