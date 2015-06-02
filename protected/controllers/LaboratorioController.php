<?php

class LaboratorioController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCreateParametro(){
        $modelParametro= new ParametroLaboratorio();
        if(isset($_POST['ParametroLaboratorio'])){
            $modelParametro->attributes=array_map('strtoupper',$_POST['ParametroLaboratorio']) ;
            if($modelParametro->validate()&&$modelParametro->save(false)){
                $this->redirect(['viewParametro']);
            }
        }
        $this->render('formParametro',['modelParametro'=>$modelParametro]);
    }

    public function actionViewParametro($id=0){
        $modelParametro= ParametroLaboratorio::model()->findByPk($id);
        if($modelParametro!=null){
            $this->render('viewParametro');
        }
        else
            throw new CHttpException(404,'Has elejido un parametro incorrecto');
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