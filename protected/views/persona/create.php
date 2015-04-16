<div class="row">
    <div class="col-md-12">

        <?php
        /* @var $this PersonaController */
        /* @var $model Persona */

        $this->breadcrumbs=array(
            'Personas'=>array('index'),
            'Create',
        );

        $this->menu=array(
            array('label'=>'List Persona', 'url'=>array('index')),
            array('label'=>'Manage Persona', 'url'=>array('admin')),
        );
        ?>
        <ul class="nav nav-tabs" id="padre">

            <li class="active"><a href="#persona"  data-toggle="tab">Datos Persona</a></li>
            <li><a href="#paciente"  data-toggle="tab">Datos Paciente</a></li>
        </ul>
        <div class="tab-content" >
            <div class="tab-pane fade active in" id="persona">
                <div class="box box-solid">
                    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="paciente">
                <div class="box box-solid">
                    <?php $this->renderPartial('_form_paciente', array('paciente'=>$paciente)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
