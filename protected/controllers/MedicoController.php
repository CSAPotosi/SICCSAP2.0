<?php

class MedicoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','CrearEspecialidadAjax','ActualizarEs','VerEspecialidad','UpdateEspecialidadAjax','CrearMedicoEspe','CrearMedico','CrearMedicoComplementarios','UpdateMedicoEspe','QuitarEspecialidad','create','update','admin','delete'),
				'roles'=>array('ADMINISTRAR_MEDICO','ADMIN'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function actionCrearEspecialidadAjax($id=0)
    {
        $especialidad= new Especialidad;
            if(isset($_POST['Especialidad'])){
                $especialidad->attributes=$_POST['Especialidad'];
                if($especialidad->save()){
                    $listaespecialidad=Especialidad::model()->findAll(array(
                        'order'=>'id_especialidad ASC',
                    ));
                    $this->renderPartial('_form_especialidades',array('listaespecialidad'=>$listaespecialidad));
                    return;
                }
            }
        $this->renderPartial('especialidad_formulario',array('especialidad'=>$especialidad));
    }

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Medico');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Medico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Medico']))
			$model->attributes=$_GET['Medico'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Medico the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Medico::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Medico $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='medico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionVerEspecialidad($id){
        $especialidad=Especialidad::model()->findByPk($id);
        $this->renderPartial('especialidad_formulario',array('especialidad'=>$especialidad));
        return;
    }
    public function actionUpdateEspecialidadAjax(){
        $especialidad=Especialidad::model()->findByPk($_POST['Especialidad']['id_especialidad']);
        if(isset($_POST['Especialidad'])){
            $especialidad->attributes=$_POST['Especialidad'];
            if($especialidad->save()){
                $listaespecialidad=Especialidad::model()->findAll(array(
                    'order'=>'id_especialidad ASC',
                ));
                $this->renderPartial('_form_especialidades',array('listaespecialidad'=>$listaespecialidad));
                return;
            }
        }
        $this->renderPartial('especialidad_formulario',array('especialidad'=>$especialidad));
    }
    public function actionCrearMedicoEspe(){
        $medico=new Medico;
        if(isset($_POST['Medico'])){
            $medico->attributes=$_POST['Medico'];
            if($medico->save()){
                if(isset($_POST['MedicoEspecialidad'])){
                $listaespecialidades=$_POST['MedicoEspecialidad'];
                    foreach($listaespecialidades as $MeEs):
                        $espemedi=new MedicoEspecialidad;
                        $espemedi->attributes=$MeEs;
                        $espemedi->id_medico=$medico->id;
                        $espemedi->save();
                    endforeach;
                }
                $this->redirect(array('persona/view','id'=>$medico->id));
            }
            $listaespecialidad=Especialidad::model()->findAll(array(
                'order'=>'id_especialidad ASC',
            ));
            $this->render('/persona/infoMedico',array('medico'=>$medico,'id'=>$_POST['Medico']['id'],'listaespecialidades'=>$listaespecialidad,'medico_especialidad'=>new MedicoEspecialidad));
        }
    }
    public function actionCrearMedicoComplementarios($id){
        $medico=new Medico;
        $medico_especialidad=new MedicoEspecialidad;
        $listaespecialidad=Especialidad::model()->findAll(array(
            'order'=>'id_especialidad ASC',
        ));
        $this->render('/persona/infoMedico',array('medico'=>$medico,'id'=>$id,'listaespecialidades'=>$listaespecialidad,'medico_especialidad'=>$medico_especialidad));
    }
    public function actionUpdateMedicoEspe($id=0){
        if($id==0){
            $medico=Medico::model()->findByPk($_POST['Medico']['id']);
        }
        else{
            $medico=Medico::model()->findByPk($id);
        }
        if(isset($_POST['Medico'])){
            $medico->attributes=$_POST['Medico'];
            if($medico->save()){
                if(isset($_POST['MedicoEspecialidad'])){
                $listaespecialidades=$_POST['MedicoEspecialidad'];
                    foreach($listaespecialidades as $MeEs):
                        $espemedi=new MedicoEspecialidad;
                        $espemedi->attributes=$MeEs;
                        $espemedi->id_medico=$medico->id;
                        $espemedi->save();
                    endforeach;
                }
                $this->redirect(array('persona/view','id'=>$medico->id));
            }
        }
        $listaespecialidad=Especialidad::model()->findAll(array(
            'order'=>'id_especialidad ASC',
        ));
        $this->render('/persona/infoMedico',array('medico'=>$medico,'id'=>($id==0? $_POST['Medico']['id']:$id),'listaespecialidades'=>$listaespecialidad,'medico_especialidad'=>new MedicoEspecialidad));
    }
    public function actionQuitarEspecialidad($id,$id_medico){
        $MedicoEspeci=MedicoEspecialidad::model()->findByPk($id);
        $MedicoEspeci->delete();
        $medico=Medico::model()->findByPk($id_medico);
        $listaespecialidad=Especialidad::model()->findAll(array(
            'order'=>'id_especialidad ASC',
        ));
        $this->render('/persona/infoMedico',array('medico'=>$medico,'id'=>$id_medico,'listaespecialidades'=>$listaespecialidad,'medico_especialidad'=>new MedicoEspecialidad));
    }
}
