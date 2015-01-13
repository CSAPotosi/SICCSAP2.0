
<center><h1>REPORTE DE ASISTENCIA</h1></center>
<div class="col-md-12">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl('Registro/Reporte'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,

)); ?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <center><h3>Seleccione el Empleado</h3></center>
            </div>
            <div class="box-body">
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-2 control-label")>Unidad</label>
                        <div class="col-sm-10">
                            <?php echo $form->dropDownList($modelR,'id_uni',
                                CHtml::listData( Unidad::model()->findAll(),'id_unidad','nombre_unidad'),
                                array(
                                    'ajax'=>array(
                                        'type'=>'POST',
                                        'url'=>$this->createUrl('Registro/elegirEmpleadoReporte'),
                                        'update'=>'#'.CHtml::activeId($modelR,'id_emp'),
                                    ),
                                    'class'=>'form-control','prompt'=>'Seleccione La Unidad'
                                )
                            );?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-2 control-label")>Empleado</label>
                        <div class="col-sm-10">
                            <?php echo CHtml::activedropDownList(Registro::model(),'id_emp',array('1'=>'Guillermo Azurduy','5'=>'liliana siles'),array('class'=>'form-control','prompt'=>'Seleccione empelado')
                            );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <center><h3>Fechas</h3></center>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Rando de Fecha</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <?php echo CHtml::activeTextField(Registro::model(),'Rango',array('class'=>'form-control pull-right','id'=>'reservation'));  ?>

                    </div><!-- /.input group -->
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Mes</label>
                        <div class="col-sm-10">
                            <?php echo CHtml::activedropDownList(Registro::model(),'id_uni',
                                array('1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'),
                                array('class'=>'form-control','prompt'=>'Seleccione el Mes')
                            );?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <center><table class="tablesorter">
                    <thead>
                    <tr>
                        <th>Unidad</th>
                        <th>Empleado</th>
                        <?php
                        $columnas = 1;
                        $grey = true;
                        $dia=1;
                        $fila=1;
                        $entrada='e';
                        for($i=0;$i<$columnas;$i++)
                        {?>
                            <th>
                                <ul class="menu">
                                    <?php echo $dia?>
                                    <li>E</li>
                                    <li>S</li>
                                </ul>
                            </th>
                            <?php $dia++;
                        }?>
                        <th>dias trabajados</th>
                        <th>Horas trabajadas</th>
                        <th>retraso en Minutos</th>
                        <th>Minutos Extras</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php for($j=0;$j<$fila;$j++){?>
                        <tr>
                            <td><?php echo $reporte->per->nombres.' '.$reporte->per->primer_apellido; ?> </td>
                            <td><?php echo $reporte->uni; ?> </td>
                            <?php
                            for($i=0;$i<$columnas;$i++)
                            {?>
                                <td>
                                    <?php echo $entrada?>
                                </td>
                            <?php
                            }?>
                            <td><?php echo $reporte->totaldiastrabajados;?></td>
                            <td><?php echo $reporte->totaltrabajado;?></td>
                            <td><?php echo $reporte->totaltiemporetraso;?></td>
                            <td><?php echo $reporte->totaltiempoextra;?></td>
                        </tr>
                    <?php

                    }
                    ?>
                    </tbody>

                </table></center>

        </div>
    </div>
</div>
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-6" >
                <?php echo CHtml::submitButton( 'generar',array('class'=>'btn btn-primary btn-lg'));?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">

    $(function() {
        $('#reservation').daterangepicker();

        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                startDate: moment().subtract('days', 29),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
    });
</script>
