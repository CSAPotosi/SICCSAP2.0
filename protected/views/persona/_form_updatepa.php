<div class="col-md-12">
    <div class="box box-primary">
        <?php
        /* @var $this PersonaController */
        /* @var $model Persona */

        $this->breadcrumbs=array(
            'Personas'=>array('index'),
            $model->id=>array('view','id'=>$model->id),
            'Update',
        );
        ?>
        <ul class="nav nav-tabs" id="pesta_persona">
            <li class="active"><a href="#persona"  data-toggle="tab">Datos Personales</a></li>
            <li><a href="#paciente"  data-toggle="tab">Datos Complementarios</a></li>
        </ul>
        <div class="tab-content" id="content_persona">
            <div class="tab-pane fade active in" id="persona">
                <div class="box box-solid">
                    <div class="box-body">
                        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="paciente">
                <div class="box box-solid">
                    <div class="box-body">
                        <?php $this->renderPartial('_form_paciente', array('paciente'=>$paciente,'model'=>$model,'lastid'=>$model->id,'contacto'=>$contacto)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>