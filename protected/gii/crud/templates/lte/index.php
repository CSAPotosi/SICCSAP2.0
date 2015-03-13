<div class="row">
    <div class="col-md-12">

        <?php echo "<?php\n"; ?>
        /* @var $this <?php echo $this->getControllerClass(); ?> */
        /* @var $dataProvider CActiveDataProvider */

        <?php
        $label=$this->pluralize($this->class2name($this->modelClass));
        echo "\$this->breadcrumbs=array(
		'$label',
	);\n";
        ?>

        $this->menu=array(
        array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
        array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
        );
        ?>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $label; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
                )); ?>
            </div>
        </div>
    </div>
</div>
