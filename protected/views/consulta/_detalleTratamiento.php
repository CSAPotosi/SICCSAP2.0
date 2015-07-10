<?php if($modelTratamiento!=null):?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-success collapsed-box">
            <div class="box-header">
                <h3 class="box-title">Tratamiento</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php echo $modelTratamiento->instrucciones_trat;?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-success collapsed-box">
            <div class="box-header">
                <h3 class="box-title">Recetas</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                QEQEQE
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            <li class="time-label">
                <span class="bg-red">asdasd</span>
            </li>
            <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item bg-green">
                    <div class="timeline-body">
                        hola mundo
                    </div>
                </div>
            </li>
            <li>
                <i class="fa fa-envelope bg-green"></i>
                <div class="timeline-item">
                    <div class="timeline-body">
                        hola mundo
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php else: ?>
    Seleccione tratamiento
<?php endif;?>