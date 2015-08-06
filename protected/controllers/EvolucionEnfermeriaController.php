<?php

class EvolucionEnfermeriaController extends Controller
{
	public function actionShowKardex($id=0)
	{
        $modelInternacion= Internacion::model()->findByPk($id);
        $modelEvo= new EvolucionEnfermeria();
        $modelEvo->id_inter=$modelInternacion->id_inter;
		$this->render('index',['modelInternacion'=>$modelInternacion,'modelEvo'=>$modelEvo]);
	}

    public function actionCreateEvolucion(){
        $modelEvo= new EvolucionEnfermeria();
        if(isset($_POST['EvolucionEnfermeria'])){
            $modelEvo->attributes=array_map('strtoupper',$_POST['EvolucionEnfermeria']);
            if($modelEvo->validate()){
                $modelEvo->save(false);
                return $this->redirect(['showKardex','id'=>$modelEvo->id_inter]);
            }
        }
        $this->render('index',['modelInternacion'=>Internacion::model()->findByPk($modelEvo->id_inter),'modelEvo'=>$modelEvo]);
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