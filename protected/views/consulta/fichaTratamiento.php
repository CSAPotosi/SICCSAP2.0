<div class="box box-solid box-primary">
    <div class="modal fade bs-example-modal-lg" id="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <?php $this->renderPartial('/Consulta/_form_tipo_antecedente',array('TipoAntecedente'=>$TipoAntecedente,'consultaModel'=>$consultaModel,'genero'=>$genero));?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('Antecedentes',array('listaante'=>$listaante,'listaAntecedenteMedico'=>$listaAntecedenteMedico,'AntecedenteMedico'=>$AntecedenteMedico,'his'=>$his))?>

</div>