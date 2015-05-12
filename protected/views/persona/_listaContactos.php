<div id="Layer1" style="height:180px; overflow: scroll;">
<div class="box-body table-responsive no-padding">
    <table class="table table-hover table-bordered" id="tablecontacto">
            <?php foreach($listaContactos as $listCont):?>
                <tr data="<?php echo $listCont->id?>" datanom="<?php echo $listCont->getNombreCompleto()?>">
                    <td id=""><?php echo $listCont->dni?></td>
                    <td id=""><?php echo $listCont->nombres?></td>
                    <td id=""><?php echo $listCont->primer_apellido?></td>
                </tr>
            <?php endforeach?>
    </div>
</div>
