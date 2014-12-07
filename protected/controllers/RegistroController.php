<?php

class RegistroController extends Controller
{
	public function actionRegistrar()
    {
        $model=new Registro();
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
}
