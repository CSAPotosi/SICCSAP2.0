    <div class="principal">
        <ul class="nav nav-tabs" id="padrepesta">

            <?php
            $var=1;
            foreach($listaante as $ante){
                if($var>0){
                    ?>
                    <li class="active"><a id="todo" title="<?php echo $ante->descripcion;?>" href="#<?php echo $ante->titulo;?>"  data-toggle="tab"><?php echo $ante->titulo;?></a></li>
                    <?php $var=$var-1; }
                else{
                    ?>
                    <li><a id="demas" title="<?php echo $ante->descripcion;?>" href="#<?php echo $ante->titulo;?>"  data-toggle="tab"><?php echo $ante->titulo;?></a></li>
                <?php } ?>
            <?php
            }
            ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><h8><span class="glyphicon glyphicon-plus"></span></h8></i></button>
        </ul>

        <div class="tab-content" id="padrecont">
            <?php
            $v=1;
            $cont=1;
            foreach($listaante as $ante){
                if($v>0){
                    ?>
                    <div class="tab-pane fade active in" id="<?php echo $ante->titulo;?>">
                        <div id="Layer1" style="width:1335px; height:595px; overflow: scroll;">
                        <table class="table" id="<?php echo $ante->titulo;?>tabla">
                            <tr>
                                <th>Tipo Antecedente</th>
                                <th>Antecedente</th>
                                <th>Fecha de Creacion</th>
                            </tr>
                            <?php
                            foreach($listaAntecedenteMedico as $medico){

                                    ?>
                                    <tr>
                                        <td><?php echo $medico->TipoAntecedente->titulo;?></td>
                                        <td><?php echo $medico->descripcion_ant;?></td>
                                        <td><?php echo $medico->fecha_creacion;?></td>
                                    </tr>
                                <?php

                            }?>
                        </table>
                        </div>
                    </div>
                    <?php $v=$v-1; }
                else{
                    ?>
                    <div class="tab-pane fade" id="<?php echo $ante->titulo;?>">
                        <div id="Layer1" style="width:1335px; height:400px; overflow: scroll;">
                                <table class="table" id="<?php echo $ante->titulo;?>tabla">
                                    <tr>
                                        <th>Tipo Antecedente</th>
                                        <th>Antecedente</th>
                                        <th>Fecha de Creacion</th>
                                    </tr>
                                    <?php
                                    foreach($listaAntecedenteMedico as $medico){
                                        $la=TipoAntecedente::model()->findByPk($medico->id_tipo);
                                        if($ante->titulo==$la->titulo){
                                        ?>
                                    <tr>
                                         <td><?php echo $la->titulo?></td>
                                         <td><?php echo $medico->descripcion_ant;?></td>
                                         <td><?php echo $medico->fecha_creacion;?></td>
                                    </tr>
                                        <?php
                                        }
                                    }?>
                                 </table>
                            </div>
                        <div id="ocultar">
                            <form method="post" name="formulario" class="formulario" id="<?php echo $cont;?>">
                                <input type="hidden" name="AntecedenteMedico[id_tipo]" value="<?php echo $ante->id_tipo_ant;?>">
                                <textarea rows="3" name="AntecedenteMedico[descripcion_ant]" style="margin: 0px; width: 1335px; height: 125px;" name="<?php echo $ante->titulo;?>"></textarea>
                            </form>
                         </div>
                    </div>
                <?php }
                $cont++;
                ?>
            <?php
            }
            ?>

        </div>
        <button id="insertar" class="btn btn-primary btn-lg" type="button">Agregar</button>
    </div>

    <?php Yii::app()->clientScript->registerScript('RegistroAntecedente','
    $(document).ready(function(){

        $("#insertar").on("click",function(){
        var contador=$(".formulario").length+1;
        var valor=2;
        while(valor<=contador){
          var text=$("#"+valor+"").children("textarea").val();
           if(text!=""){
           var data=$("#"+valor+"").serialize();

            $.ajax({
                url: \''.CHtml::normalizeUrl(array("/Consulta/NuevoAntecedente")).'\',
                type: \'post\',
                data: data,
                success: function(datos)
                {
                    if(datos.success)
                    {
                        $(\'<tr><td>\'+datos.tipo+\'</td><td>\'+datos.descripcion_ant+\'</td><td>\'+datos.fechaCreacion.toString()+\'</td></tr>\').appendTo("#"+datos.tipo+"tabla");
                        $(\'<tr><td>\'+datos.tipo+\'</td><td>\'+datos.descripcion_ant+\'</td><td>\'+datos.fechaCreacion.toString()+\'</td></tr>\').appendTo("#Todotabla");
                    }
                }
            });
            $("#"+valor+"")[0].reset();
            }
            valor++;
        }
        return false;
        })
    })
    ');?>