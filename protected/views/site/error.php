<?php
$this->pageTitle='Error '.$code;
$this->breadcrumbs=array(
	'Error '.$code,
);
?>

<div class="error-page">
    <h2 class="headline text-red"><?php echo $code; ?></h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> <?php echo CHtml::encode($message); ?></h3>
        <br/>
        <p>
            Informe al administrador del sistema el error ocurrido.<br/>
            Tambien puede regresar al  <a href='<?php echo CHtml::normalizeUrl(["/"])?>'>Inicio del sistema</a> y realizar las tareas que intentaba hacer.
        </p>

    </div>
</div><!-- /.error-page -->