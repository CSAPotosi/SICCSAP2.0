<div class="row">
    <div class="col-md-12">
        <ul id="tabsPersona" class="nav nav-tabs" role="tab-panel">
            <li role="presentation" ><a href="#antecedente" id="antecedente-tab" role="tab" data-toggle="tab" aria-controls="antecedente" aria-expanded="false">Antecedentes Medicos</a></li>
            <li role="presentation" class="active"><a href="#consulta" id="consulta-tab" role="tab" data-toggle="tab" aria-controls="consulta" aria-expanded="false">Consulta</a></li>
            <li role="presentation" ><a href="#reconsulta" id="reconsulta-tab" role="tab" data-toggle="tab" aria-controls="reconsulta" aria-expanded="false">Reconsulta</a></li>
            <li role="presentation" ><a href="#receta" id="receta-tab" role="tab" data-toggle="tab" aria-controls="receta" aria-expanded="false">Recetas</a></li>
        </ul>
        <div id="tabcontent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="antecedente" aria-labelledby="antecedente-tab">
                <div class="box box-solid">
                    asdasd
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="consulta" aria-labelledby="consulta-tab">
                <div class="box box-solid">
                    <div class="box-body">
                        <?php $this->renderPartial('_form_diagnostico',array('ConsultaModel'=>$ConsultaModel,'SVModelList'=>$SVModelList)); ?>
                    </div>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade" id="reconsulta" aria-labelledby="reconsulta-tab">
                hola mundo 3x
            </div>
            <div role="tabpanel" class="tab-pane fade" id="receta" aria-labelledby="receta-tab">
                hola mundo 4
            </div>
        </div>
    </div>
</div>