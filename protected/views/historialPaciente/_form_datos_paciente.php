<div class="row">
    <div class="col-md-12">
        <div class="box collapsed-box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title"><b><?php echo $model->paciente->personapa->nombreCompleto;?><small class="label label-primary"> Datos personales</small></b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <div class="box-body" style="display: none;">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo CHtml::image(Yii::app()->baseUrl.'/fotografias/'.$model->paciente->personapa->fotografia,null,array('class'=>'img-circle img-thumbnail img-responsive','style'=>'max-width:50px'))?>
                    </div>
                    <div class="col-md-10">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td><b>CODIGO DE HISTORIA CLINICA</b></td>
                                <td><span class="time text-bold">CSA-<?php echo $model->paciente->personapa->codigo;?></span></td>
                            </tr>
                            <tr>
                                <td><b>NOMBRE COMPLETO</b></td>
                                <td><span class="time text-bold"><?php echo $model->paciente->personapa->nombreCompleto;?></span></td>
                            </tr>
                            <tr>
                                <td><b>OCUPACION / PROFESION</b></td>
                                <td><span class="time text-bold"><?php echo $model->paciente->ocupacion_paciente;?></span></td>
                            </tr>
                            <tr>
                                <td><b>EDAD</b></td>
                                <td><span class="time text-bold"><?php echo $model->paciente->personapa->edad;$model->paciente->personapa->fecha_nacimiento;?></td>
                            </tr>
                            <tr>
                                <td><b>SEXO</b></td>
                                <td><span class="time text-bold"><?php echo $model->paciente->personapa->sexo;$model->paciente->personapa->fecha_nacimiento;?></td>
                            </tr>
                            <tr>
                                <td><b>DIRECCION</b></td>
                                <td><span class="time text-bold"><?php echo $model->paciente->personapa->direccion;?></span></td>
                            </tr>
                            <div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer" style="display: none;">
                <?php echo CHtml::link('Ver informacion completa',array('persona/view','id'=>$model->paciente->personapa->id),array('class'=>'btn btn-success'));?>
            </div>
        </div>

    </div>
</div>