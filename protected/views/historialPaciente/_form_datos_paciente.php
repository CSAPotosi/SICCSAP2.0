<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Informacion del Paciente</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo CHtml::image(Yii::app()->baseUrl.'/fotografias/'.$model->idHistorial->personapa->fotografia,null,array('class'=>'img-circle img-thumbnail img-responsive','style'=>'max-width:50px'))?>
                    </div>
                    <div class="col-md-10">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td><b>CODIGO DE HISTORIA CLINICA</b></td>
                                <td><span class="time text-bold">CSA-<?php echo $model->idHistorial->personapa->codigo;?></span></td>
                            </tr>
                            <tr>
                                <td><b>NOMBRE COMPLETO</b></td>
                                <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->nombreCompleto;?></span></td>
                            </tr>
                            <tr>
                                <td><b>OCUPACION / PROFESION</b></td>
                                <td><span class="time text-bold"><?php echo $model->idHistorial->ocupacion_paciente;?></span></td>
                            </tr>
                            <tr>
                                <td><b>EDAD</b></td>
                                <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->edad;$model->idHistorial->personapa->fecha_nacimiento;?></td>
                            </tr>
                            <tr>
                                <td><b>SEXO</b></td>
                                <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->sexo;$model->idHistorial->personapa->fecha_nacimiento;?></td>
                            </tr>
                            <tr>
                                <td><b>DIRECCION</b></td>
                                <td><span class="time text-bold"><?php echo $model->idHistorial->personapa->direccion;?></span></td>
                            </tr>
                            <div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?php echo CHtml::link('Ver informacion completa',array('persona/view','id'=>$model->idHistorial->personapa->id),array('class'=>'btn btn-success'));?>
            </div>
        </div>

    </div>
</div>