<div class="box box-primary">
    <?php if($tipo_paciente=='beneficiario'){?>
        <div class="col-md-6">
            <label>Paciente Titular</label>
            <div class="input-group margin">
                <input class="form-control" type="text" id="id_paciente_titular_nombre" placeholder="Paciente Titular" disabled>
                    <span class="input-group-btn">
                         <button class="btn btn-primary" type="button" id="btnSeguroTitular"><i class="fa fa-fw fa-search"></i></button>
                    </span>
            </div>
        </div>
        <input type="hidden" name="SeguroConvenio[id_paciente_titular]" id="paciente_titular">
        <div class="col-md-6">
            <div class="form-group">
                <label>Conveio Institucional</label>
                <input type="hidden" class="form-control" name="SeguroConvenio[id_convenio_institucion]" id="convenio_insti">
                <input type="text" class="form-control" id="convenio_insti_nombre" disabled>
            </div>
        </div>
    <?php }else{?>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo CHtml::activelabelEx($seguro,'Convenio Institucional'); ?>
                <?php echo CHtml::activedropDownList($seguro,'id_convenio_institucion',$listaseguros,array('class'=>'form-control','id'=>'convenio_insti')); ?>
            </div>
        </div>
    <?php }?>

</div>