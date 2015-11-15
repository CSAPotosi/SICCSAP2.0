<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        Registrar Turno
                    </div>

                        <?php $this->renderPartial('/turno/_form', array('turno'=>$turno)); ?>

                </div>
            </div>
            <div class="col-md-7">
                <div class="">
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            Turnos Registrados
                        </div>
                        <?php $this->renderPartial('listaturnoHorario',array('listaTurno'=>$listaTurno))?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
