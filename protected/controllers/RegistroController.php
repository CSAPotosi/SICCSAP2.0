<?php

class RegistroController extends Controller
{
	public function actionRegistrar()
    {
        $model=new Registro;
        if(isset($_POST['Registro']))
        {
            $var=$model->id_asignacion=$_POST['Registro']['id_asignacion'];
            $model->fecha=$_POST['Registro']['fecha'];
            $model->hora_asistencia=$_POST['Registro']['hora_asistencia'];
            $model->observaciones=$_POST['Registro']['observaciones'];

            $model->getAsignacion($var);
            $model->save();
        }
        $this->render('registrar',array('model'=>$model));
    }
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('Elegircargo','Elegirempleado'),
                'users'=>array('*'),
            ),
        );
    }
    public function actionElegircargo()
    {
        $id_uno=(int)$_POST['Registro']['id1'];
        $lista=Cargo::model()->findAll('id_unidad = :id_uno',array(':id_uno'=>$id_uno));
        $lista=CHtml::listData($lista,'id_cargo','nombre_cargo');
        foreach($lista as $valor=> $descripcion)
        {
            echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
        }
    }
    public function actionElegirempleado()
    {
        $id_dos=(int)$_POST['Registro']['id2'];
        $cryteria=new CDbCriteria;
        $cryteria->select='t.*';

        $cryteria->join='inner join empleado e on t.id=e.id inner join asignacion_empleado a on a.id_empleado=e.id inner join cargo c on c.id_cargo=a.id_cargo';
        $cryteria->condition='a.fecha_fin is null and c.id_cargo='.$id_dos;
        //var_dump($cryteria);







        $lista=Persona::model()->findAll($cryteria);
        //var_dump($lista);
        $lista=CHtml::listData($lista,'id','primer_apellido');
        foreach($lista as $valor=> $descripcion)
        {
            echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
        }
    }

}
