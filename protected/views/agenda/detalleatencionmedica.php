<div class="row">
    <div class="col-md-12">
        <div class="box-body">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data'=>$servicio,
                'attributes'=>array(
                    'nombre_serv',
                    'estado_serv',
                    'fecha_actualizacion',
                    'idInsti.nombre',
                ),
                'htmlOptions'=>array('class'=>'table table-condensed'),
            ));
            $this->widget('zii.widgets.CDetailView', array(
                'data'=>$atencionmedica,
                'attributes'=>array(
                'tipo_atencion',
                ),
                'htmlOptions'=>array('class'=>'table table-condensed'),
            ));

            $this->widget('zii.widgets.CDetailView', array(
            'data'=>$atencionmedica->idME->idMedico->medicopersona,
            'attributes'=>array(
                'nombreCompleto',
                'telefono',
                'celular',
                'email',
            ),
            'htmlOptions'=>array('class'=>'table table-condensed'),
            ));
            $this->widget('zii.widgets.CDetailView', array(
                'data'=>$atencionmedica->idME->idEspecialidad,
                'attributes'=>array(
                    'nombre_especialidad',
                ),
                'htmlOptions'=>array('class'=>'table table-condensed'),
            ));
            ?>
        </div>
    </div>
</div>