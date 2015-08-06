<div class="box box-solid" id="listaPersonas">
    <div class="box-body bg-gray" id="contenidoListaPersonas">
        <ul class="timeline">
            <?php foreach($usuarios as $item): ?>
                <li>
                    <i class="fa fa-user bg-aqua"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> </span>
                        <h3 class="timeline-header"><?php echo $item->getAttributeLabel('nombre').":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".CHtml::link($item->nombre,array('/usuario/view', 'id'=>$item->id_usuario)); ?></h3>
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php echo CHtml::image(Yii::app()->baseUrl.'/fotografias/'.$item->persona->fotografia,null,array('class'=>'img-circle img-thumbnail img-responsive '))  ?>
                                </div>
                                <div class="col-md-10">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr >
                                            <td><b>Nombre Persona:</b></td>
                                            <td><?php echo $item->persona->nombreCompleto;?></td>
                                        </tr>
                                        <tr >
                                            <td><b><?php echo $item->getAttributeLabel('dni'); ?>:</b></td>
                                            <td><?php echo $item->persona->dni;?></td>
                                        </tr>
                                        <tr >
                                            <td><b><?php echo $item->persona->getAttributeLabel('direccion'); ?>:</b></td>
                                            <td><?php echo $item->persona->direccion;?></td>
                                        </tr>
                                        <tr >
                                            <td><b><?php echo $item->persona->getAttributeLabel('telefono'); ?>:</b></td>
                                            <td><?php echo $item->persona->telefono;?></td>
                                        </tr>
                                        <tr >
                                            <td><b><?php echo $item->getAttributeLabel('estado'); ?>:</b></td>
                                            <td><?php echo ($item->nombre)?"ACTIVO":"INACTIVO";?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-footer">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-8">
                                    <?php echo CHtml::link("Mas Informacion",array('/usuario/view','id'=>$item->id_usuario),array('class'=>'btn btn-primary btn-md pull-right')); ?>&nbsp;
                                    <a class="btn btn-danger btn-md pull-right">Agregar Roles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php  endforeach; ?>
        </ul>

    </div>
</div>