<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Usuarios',
);

$this->menu=array(
    array('label'=>'Create Usuario', 'url'=>array('create')),
    array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-md-12">

        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-2">
                        <a class="btn btn-block btn-social bg-blue" href="/SICCSAP2.0/index.php?r=Persona/create"><i class="fa fa-user"></i>Nuevo Usuario</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            Mostrando del registro <?php echo $start+1 ?> al <?php echo $start+$block?>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="dataTables_paginate paging_simple_numbers">
                            <ul class="pagination  no-margin pull-right">
                                <li class="paginate_button previous <?php if($start-$block<0)echo "disabled";?>" id="example2_previous">
                                    <a href="?r=usuario&start=<?php if($start-$block<0) echo 0; else echo ($start-$block) ?>&block=<?php echo $block ?>">&lt;Anterior</a>
                                </li>
                                <?php for($i=0;$i<$total;$i=$i+$block):?>
                                    <?php if($i==$start): ?>
                                        <li class="paginate_button active">
                                            <a href="?r=usuario&start=<?php echo $i; ?>&block=<?php echo $block ?>"><?php echo ($i/$block)+1; ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="paginate_button ">
                                            <a href="?r=usuario&start=<?php echo $i; ?>&block=<?php echo $block ?>"><?php echo ($i/$block)+1; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <li class="paginate_button next <?php if($start+$block>=$total)echo "disabled";?>" id="example2_next">
                                    <a href="?r=usuario&start=<?php if($start+$block>=$total) echo $start; else echo $start+$block ?>&block=<?php echo $block ?>">Posterior&gt;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  $this->renderPartial('_view',array('usuarios'=>$usuarios,'start'=>$start,'block'=>$block,'total'=>$total)); ?>

        <div class="row">
            <div class="col-sm-3">
                <div class="dataTables_info" role="status" aria-live="polite">
                    Mostrando del registro <?php echo $start+1 ?> al <?php echo $start+$block?>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination  no-margin pull-right">
                        <li class="paginate_button previous <?php if($start-$block<0)echo "disabled";?>" id="example2_previous">
                            <a href="?r=usuario&start=<?php if($start-$block<0) echo 0; else echo ($start-$block) ?>&block=<?php echo $block ?>">&lt;Anterior</a>
                        </li>
                        <?php for($i=0;$i<$total;$i=$i+$block):?>
                            <?php if($i==$start): ?>
                                <li class="paginate_button active">
                                    <a href="?r=usuario&start=<?php echo $i; ?>&block=<?php echo $block ?>"><?php echo ($i/$block)+1; ?></a>
                                </li>
                            <?php else: ?>
                                <li class="paginate_button ">
                                    <a href="?r=usuario&start=<?php echo $i; ?>&block=<?php echo $block ?>"><?php echo ($i/$block)+1; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li class="paginate_button next <?php if($start+$block>=$total)echo "disabled";?>" id="example2_next">
                            <a href="?r=usuario&start=<?php if($start+$block>=$total) echo $start; else echo $start+$block ?>&block=<?php echo $block ?>">Posterior&gt;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div><!-- /.col -->
</div>



<div class="row">
    <div class="col-md-12">

    </div><!-- /.col -->
</div>
