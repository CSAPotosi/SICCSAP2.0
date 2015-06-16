<div class="col-md-6">
    <div class="box box-primary">
       <div class="box-header">
           <h4>Ordenes de servicios en Internacion</h4>
       </div>
       <div class="box-body">
           <?php $soli=$solicitud[0];?>
           <div class="callout callout-info">
               <h3><i>PACIENTE INTERNADO:</i>&nbsp;&nbsp;&nbsp;<?php echo $soli->idHistorial->paciente->personapa->getNombreCompleto();?></h3>
           </div>
           <table class="table table-hover bordered">
               <tr>
                   <th>Fecha Solicitud</th>
                   <th>Observaciones</th>
                   <th>Ver detalle</th>
               </tr>
               <?php foreach($solicitud as $sol):?>
                    <tr>
                        <td><?php echo $sol->fecha_solicitud?></td>
                        <td><?php echo $sol->observaciones?></td>
                        <td><?php echo CHtml::link("<i class='fa fa-fw fa-eye'></i>",array('SolicitudServicios/Verdetallesolicitud','id'=>$sol->id_solicitud),array('class'=>'btn btn-primary', 'target'=>'_blank','title'=>'Ver Detalle'))?></td>
                    </tr>
               <?php endforeach?>
           </table>
       </div>
    </div>
</div>