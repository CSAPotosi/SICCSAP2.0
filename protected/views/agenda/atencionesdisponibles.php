<div id="Layer1" style="height:280px; overflow: scroll;">
<table class="table table-hover bordered">
    <thead>
    <tr>
        <th>Medico</th>
        <th>Especialidad</th>
        <th>Tipo Atencion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($atencionmedica as $list):?>
        <tr>
            <td><?php echo $list->idME->idMedico->medicopersona->nombreCompleto?></td>
            <td><?php echo $list->idME->idEspecialidad->nombre_especialidad?></td>
            <td><?php echo $list->tipo_atencion?></td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
</div>