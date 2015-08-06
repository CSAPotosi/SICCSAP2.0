<style>
    .users-list li:hover{
        background: #00c0ef;
        cursor: hand;
        cursor: pointer;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <?php echo CHtml::textField('txtPersona',null,['class'=>'form-control','placeholder'=>'ESCRIBA AQUI PARA COMENZAR LA BUSQUEDA']);?>
        </div>
        <div class="form-group">
            <b>TIPO DE PERSONA: </b>
            <?php echo CHtml::radioButtonList('tipo_persona','MEDICO',['MEDICO'=>'MEDICO','ENFERMERA'=>'ENFERMERA'],['separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;'])?>
        </div>
        <div class="box box-solid box-primary" id="lista-completa">
            <div class="box-body">
                <?php $this->renderPartial('_listaPersonas',['listaPersonas'=>$listaPersonas]);?>
            </div>
        </div>
    </div>
</div>