<?php

class LaboratorioController extends Controller
{
	public function actionIndex()
	{
        $listaParametros=ParametroLaboratorio::model()->findAll(['order'=>'estado_par_lab DESC']);
		return $this->render('index',['listaParametros'=>$listaParametros]);
	}

    public function actionCreateParametro(){
        $modelParametro= new ParametroLaboratorio();

        if(isset($_POST['ParametroLaboratorio'])){
            $modelParametro->attributes=array_map('strtoupper',$_POST['ParametroLaboratorio']) ;
            if($modelParametro->validate()&&$modelParametro->save(false)){
                $this->redirect(['viewParametro','id'=>$modelParametro->id_par_lab]);
            }
        }
        $this->render('formParametro',['modelParametro'=>$modelParametro]);
    }

    public function actionViewParametro($id=0){
        $modelParametro= ParametroLaboratorio::model()->findByPk($id);
        if($modelParametro!=null){
            $this->render('viewParametro',['modelParametro'=>$modelParametro]);
        }
        else
            throw new CHttpException(404,'Has elejido un parametro incorrecto');
    }

    public function actionUpdateParametro($id_par=0){
        $modelParametro=ParametroLaboratorio::model()->findByPk($id_par);
        if(isset($_POST['ParametroLaboratorio'])){
            $modelParametro->attributes=array_map('strtoupper',$_POST['ParametroLaboratorio']);
            if($modelParametro->validate()&&$modelParametro->save(false))
                $this->redirect(['viewParametro','id'=>$modelParametro->id_par_lab]);
        }
        $this->render('formParametro',['modelParametro'=>$modelParametro]);
    }

    public function actionCreateRango($id_par=0){
        $modelParametro=ParametroLaboratorio::model()->findByPk($id_par);
        $modelRango= new RangosParametro();
        if(isset($_POST['RangosParametro'])){
            $modelRango->attributes=array_map('strtoupper',$_POST['RangosParametro']);
            if($modelRango->validate()&&$modelRango->save(false)){
                return $this->redirect(['viewParametro','id'=>$modelParametro->id_par_lab]);
            }
        }
        return $this->render('createRango',['modelParametro'=>$modelParametro,'modelRango'=>$modelRango]);
    }


    public function actionUpdateRango($id_rango=0){
        $modelRango=RangosParametro::model()->findByPk($id_rango);
        if(isset($_POST['RangosParametro'])){
            $modelRango->attributes=array_map('strtoupper',$_POST['RangosParametro']);
            if($modelRango->validate()&&$modelRango->save(false)){
                return $this->redirect(['viewParametro','id'=>$modelRango->id_par_lab]);
            }
        }
        return $this->render('updateRango',['modelRango'=>$modelRango]);
    }

    public function actionDeleteRango($id_rango=0){
        $modelRango=RangosParametro::model()->findByPk($id_rango);
        $modelRango->delete();
        return $this->redirect(['viewParametro','id'=>$modelRango->id_par_lab]);
    }

    public function actionAsignarParametros($id_examen=0){
        $modelLaboratorio=ExamenLaboratorio::model()->findByPk($id_examen);
        $parametroList=ParametroLaboratorio::model()->findAll(['order'=>'estado_par_lab DESC,nombre_par_lab ASC']);
        if(isset($_POST['Parametro'])&&$modelLaboratorio!=null){
            Yii::app()->db->createCommand()->delete('examen_parametros','id_serv=:id_serv',['id_serv'=>$id_examen]);
            if(isset($_POST['Parametro']['item'])){
                foreach($_POST['Parametro']['item'] as $id_par){
                    Yii::app()->db->createCommand()->insert('examen_parametros',['id_serv'=>$id_examen,'id_par_lab'=>$id_par]);
                }
                Yii::app()->user->setFlash('success','Los datos del examen han sido guardados satisfactoriamente.');
            }
            $this->redirect(['asignarParametros','id_examen'=>$id_examen]);
        }
        return $this->render('asignarParametros',['parametroList'=>$parametroList,'modelLaboratorio'=>$modelLaboratorio]);
    }

    public function actionChangeStateParametro($id=0,$state=0){
        $modelParametro=ParametroLaboratorio::model()->findByPk($id);

        if($modelParametro!=null){
            $modelParametro->estado_par_lab=$state;
            $modelParametro->save();
        }
        return $this->redirect(['index']);
    }


    public function actionCreateExamenLab(){
        return $this->render('createExamenLab');
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