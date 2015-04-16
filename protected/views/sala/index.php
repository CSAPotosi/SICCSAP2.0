<div class="col-md-12">

	<?php
	/* @var $this SalaController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Salas',
	);

	?>
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Tipo Salas</h3>
		</div>
		<div class="box-body">
            <div class="row">
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_view',
                )); ?>
            </div>
		</div>
	</div>
</div>