<div id="Layer1" style="height:200px; overflow: scroll;">
    <table class="table table-hover bordered">
        <tr>
            <th>Paciente</th>
            <th>Convenio Institucional</th>
            <th>Fecha Inicio</th>
            <th>Estado</th>
        </tr>
        <?php foreach($listapacientesasegurados as $list):?>
            <tr data-idconvenio="<?php echo $list->id_convenio_institucion?>" class="aseguradospacientes" data-convenio="<?php echo $list->ConvenioInstitucional->nombre_convenio?>" data-idpaciente="<?php echo $list->id_paciente?>" data-paciente="<?php echo $list->PacienteAsegurado->personapa->nombreCompleto?>">
                <td><?php echo $list->PacienteAsegurado->personapa->nombreCompleto?></td>
                <td><?php echo $list->ConvenioInstitucional->nombre_convenio?></td>
                <td><?php echo $list->fecha_inicio?></td>
                <td><?php echo ($list->estado?'activo':'inactivo')?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>