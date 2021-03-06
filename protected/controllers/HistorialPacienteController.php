<?php

class HistorialPacienteController extends Controller
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
				'actions'=>array('index','view','PacienteEmergencia','CrearPacienteEmergencia','create','update','admin','delete'),
                'roles'=>array('ADMIN'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

        $listaConsulta=new CActiveDataProvider('Consulta',array(
            'criteria'=>array(
                'condition'=>"id_historia={$id} and id_consulta_padre is null",
                'order'=>'fecha_diagnostico DESC',
                'limit'=>5,
            ),
            'pagination'=>false,
        ));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'listaConsulta'=>$listaConsulta,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new HistorialPaciente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HistorialPaciente']))
		{
			$model->attributes=$_POST['HistorialPaciente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_historial));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['HistorialPaciente']))
		{
			$model->attributes=$_POST['HistorialPaciente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_historial));
		}
		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('HistorialPaciente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionAdmin()
	{
		$model=new HistorialPaciente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HistorialPaciente']))
			$model->attributes=$_GET['HistorialPaciente'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HistorialPaciente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HistorialPaciente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HistorialPaciente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='historial-paciente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionPacienteEmergencia(){
        $persona=new Persona;
        $paciente=new Paciente;
        $historial=new HistorialPaciente;
        $this->render('form_emergencia',array(
            'persona'=>$persona,
            'paciente'=>$paciente,
            'historial'=>$historial,
        ));
    }
    public function actionCrearPacienteEmergencia(){
        $persona=new Persona;
        $paciente=new Paciente;
        $historial=new HistorialPaciente;
        if(isset($_POST['Persona'])){
            $persona->attributes=array_map('strtoupper',$_POST['Persona']);
            $persona->fotografia='no-photo.png';
            if($persona->save()){
                $paciente->id_paciente=$persona->id;
                $paciente->save();
                $historial->id_historial=$persona->id;
                $historial->save();
                $this->redirect(array('view','id'=>$persona->id));
            }
            $this->render('form_emergencia',array(
                'persona'=>$persona,
            ));
        }
    }
}
