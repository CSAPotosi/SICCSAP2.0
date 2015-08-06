<?php if($listaPersonas !=null):?>
    <ul class="users-list clearfix">
        <?php foreach($listaPersonas as $itemP):?>
            <li data-id="<?php echo $itemP->id;?>">
                <img src="<?php echo Yii::app()->baseUrl.'/fotografias/'.$itemP->fotografia;?>" alt="User Image" width="66 px" height="66 px"/>
                <div class="users-list-name"><?php echo $itemP->nombreCompleto;?></div>
                    <span class="users-list-date">
                        <?php echo $itemP->dni;?>
                    </span>
            </li>
        <?php endforeach;?>
    </ul>
<?php else:?>
    <span class="label label-primary">No se han encontrado resultados</span>
<?php endif;?>