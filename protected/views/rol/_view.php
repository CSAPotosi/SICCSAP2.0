<?php
/* @var $this AuthItemController */
/* @var $data AuthItem */
?>

<div class="view">
    <table class="table table-bordered">
        <tr>
            <td>
                <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
            </td>
            <td>
                <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->name)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
            </td>
            <td>
                <?php echo CHtml::encode($data->description); ?>
            </td>
        </tr>
    </table>
</div>