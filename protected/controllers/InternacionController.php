<?php

class InternacionController extends Controller
{
    public $layout='//layouts/column2';

	public function actionIndex($id=0){
        $modelInternacion=Internacion::model()->findByPk($id);
        if($modelInternacion==null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $this->render('index',['modelInternacion'=>$modelInternacion]);
    }

    public function actionCreateInternacion($id){
        $modelInternacion =new Internacion();
        $modelInternacion->id_historial=$id;
        if(isset($_POST['Internacion'])){
            $modelInternacion->attributes=array_map('strtoupper',$_POST['Internacion']) ;
            if($modelInternacion->validate()){
                if($modelInternacion->save(false)){
                    $modelInternacion->historial->paciente->estado_paciente='INTERNADO';
                    $modelInternacion->historial->paciente->save();
                    if(isset($_POST['Sala'])){
                        $modelSalaInter= new SalaInternacion();
                        $modelSalaInter->id_sala=$_POST['Sala']['id_sala'];
                        $modelSalaInter->id_inter=$modelInternacion->id_inter;
                        if($modelSalaInter->validate()&&$modelSalaInter->save(false)){
                            $modelSalaInter->sala->estado_sala=2;
                            $modelSalaInter->sala->save();
                        }
                    }
                }
                return $this->redirect(['internacion/index','id'=>$modelInternacion->id_inter]);
            }
        }
        return $this->render('createInternacion',['model'=>HistorialPaciente::model()->findByPk($id),'modelInternacion'=>$modelInternacion]);
    }



	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}