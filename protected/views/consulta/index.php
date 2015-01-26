<ul id="tabsDiagnostico" class="nav nav-tabs" role="tab-panel">
    <li role="presentation" ><a href="#antecedentes" id="antecedente-tab" role="tab" data-toggle="tab" aria-controls="antecedente" aria-expanded="false">Antecedentes</a></li>
    <li role="presentation" class="active"><a href="#diagnostico" id="diagnostico-tab" role="tab" data-toggle="tab" aria-controls="diagnostico" aria-expanded="false">Diagnostico</a></li>
    <li role="presentation"><a href="#receta" id="receta-tab" role="tab" data-toggle="tab" aria-controls="receta" aria-expanded="false">Receta</a></li>
    <li role="presentation"><a href="#reconsulta" id="reconsulta-tab" role="tab" data-toggle="tab" aria-controls="reconsulta" aria-expanded="false">Reconsulta</a></li>
</ul>
<div id="tabcontent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="antecedentes" aria-labelledby="antecedentes-tab">
    <div class="col-md-12">
        <div class="box box-primary" id="morbicos">
            <div class="box-header">
                <h2 class="box-title">Antecedentes Morbicos</h2>
            </div>
            <table class=table table-bordered">
                <thead>
                <tr>
                    <th align="center"><label class="control-label">Fecha de Registro</label></th>
                    <th><label class="col-md-1 control-label">Nombre</label></th>
                    <th><label class="col-md-1 control-label">Tipo</label></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date"></td>
                        <td><input class="input-xlarge" type="text" placeholder="Nombre"></td>
                        <td>
                            <select>
                                <option>Enfermedad</option>
                                <option>Traumatismo</option>
                                <option>Cirugia</option>
                            </select>
                            <button class="btn btn-small" type="button">Small button</button>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box box-primary" id="alergias">
            <div class="box-header">
                <h2 class="box-title">Habitos</h2>
            </div>
            <table class=table table-bordered">
            <thead>
            <tr>
                <th align="center"><label class="control-label">Origen</label></th>
                <th><label class="col-md-1 control-label">Via</label></th>
                <th><label class="col-md-1 control-label">efectos</label></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input class="input-xlarge" type="text" placeholder="Nombre"></td>
                <td><select>
                        <option>Medicamentos</option>
                        <option>Alimentos</option>
                        <option>Sustancias</option>
                        <option>Sustancia al contacto con la piel</option>
                        <option>Picadura de Insecto</option>
                    </select>
                </td>
                <td>
                    <input class="input-xlarge" type="text" placeholder="Nombre">
                    <button class="btn btn-small" type="button">Small button</button>
                </td>
            </tr>
            <tr>
            </tr>
            </tbody>
            </table>
        </div>
        <div class="box box-primary" id="inmunizaciones">

        </div>
        <div class="box box-primary" id="habitos">

        </div>
        <div class="box box-primary" id="familiares">

        </div>
    </div>

    </div>
    <div role="tabpanel" class="tab-pane fade active in" id="diagnostico" aria-labelledby="diagnostico-tab">

    </div>
    <div role="tabpanel" class="tab-pane fade active in" id="receta" aria-labelledby="receta-tab">

    </div>
    <div role="tabpanel" class="tab-pane fade active in" id="reconsulta" aria-labelledby="reconsulta-tab">

    </div>
</div>

