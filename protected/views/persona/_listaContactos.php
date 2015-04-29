<div class="box-body table-responsive no-padding">

    <table class="table table-hover table-bordered">
        <div class="tbody">
            <?php foreach($listaContactos as $listCont):?>
                <tr id="<?php echo $listCont->id?>">
                    <td><?php echo $listCont->dni?></td>
                    <td><?php echo $listCont->nombres?></td>
                    <td><?php echo $listCont->primer_apellido?></td>
                </tr>
            <?php endforeach?>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScript('seleccionarContacto','
        $(document).ready(function(){
            alert("jojlm");
        })
');?>