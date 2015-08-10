<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
    'Auth Items'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List AuthItem', 'url'=>array('index')),
    array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<?php
Yii::app()->clientScript->registerScript('search','
    $("#roles-grid").hide();


    $(".selectrol").on("click",function(e){
        e.preventDefault();
        $("#nombrerol").prop("value",$(this).val());
        $(".selectrol").removeClass("btn-info");
        $(this).addClass("btn-info");
        $("#roles-grid").slideToggle(400);
        $(".rolesitems").removeClass("hidden");
        $("#"+$(this).val()).addClass("hidden");
    });
    $("#nombrerol").on("click",function(){
        $("#roles-grid").slideToggle(400);
        $(this).prop("maxlength","0");
        $(this).prop("placeholder","Escoger un rol de la siguiente tabla:");

    });
');

?>


<h1>Asignar Rol</h1>



<div class="row"">
<div class="col-md-12">

    <?php
    /* @var $this AuthItemController */
    /* @var $model AuthItem */

    $this->breadcrumbs=array(
        'Auth Items'=>array('index'),
        'Create',
    );

    $this->menu=array(
        array('label'=>'List AuthItem', 'url'=>array('index')),
        array('label'=>'Manage AuthItem', 'url'=>array('admin')),
    );
    ?>
    <div class="box box-primary">
        <div class="box-header">
            <h2>Asignar SubRoles</h2>
        </div>
        <div class="box-body">
            <div class="form">
                <?php echo CHtml::beginForm(); ?>

                <div class="form-group">
                    <label> Nombre Rol</label>
                    <input type="text" id="nombrerol" name="nombrerol" class="form-control"/>
                    </div>

                    <table class="table table-bordered" id="roles-grid">
                        <tbody>
                        <?php if($roles!=null): ?>
                            <?php $var=0;?>
                            <?php foreach($items as $item): ?>
                                <?php if($var==0) echo "<tr>"; ?>
                                <td><button class="btn btn-block btn-default selectrol" value="<?php echo $item->name; ?>"><?php echo $item->name; ?></button>
                                <?php if($var==3) { echo "</td>"; $var=0;} else $var=$var+1;  ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No existen Roles</p>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header"><h4> Seleccionar Roles para asignar</h4></div>
                            <div class="box-body">
                                <?php foreach($roles as $i=>$item): ?>
                                    <div class="col-md-3 rolesitems" id="<?php echo $item->name;?>" >
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="roles[]" value=<?php echo $item->name;?> /><?php echo $item->name;?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-header"><h4> Seleccionar Roles para asignar</h4></div>
                            <div class="box-body">
                                <?php foreach($tareas as $i=>$item): ?>
                                    <div class="col-md-3 rolesitems" id="<?php echo $item->name;?>" >
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="roles[]" value=<?php echo $item->name;?> /><?php echo $item->name;?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-header"><h4> Seleccionar Roles para asignar</h4></div>
                            <div class="box-body">
                                <?php foreach($operaciones as $i=>$item): ?>
                                    <div class="col-md-3 rolesitems" id="<?php echo $item->name;?>" >
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="roles[]" value=<?php echo $item->name;?> /><?php echo $item->name;?></label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?php echo CHtml::submitButton('Save',array('class'=>'btn btn-primary btn-lg')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>
</div>
