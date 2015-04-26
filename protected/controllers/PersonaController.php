<?php

class PersonaController extends Controller
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
				'actions'=>array('index','view','Crearcontacto','Crearpaciente','_form_updatepa','_form_Updateper'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','buscarPersonaAjax','updatepa'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Persona;
        $paciente=new Paciente;
		if(isset($_POST['Persona']))
		{
            $filename="no-photo.png";
            if (!empty($_POST['Persona']['fotografia']))
            {
                $foto = $_POST['Persona']['fotografia'];
                //var_dump($foto);

                //Decode with base64
                $foto = str_replace('data:image/png;base64,', '', $foto);
                $foto = str_replace(' ', '+', $foto);
                //var_dump($foto);
                $data_foto = base64_decode($foto);
                //echo "foto decodificada 64: ";
                //var_dump($data_foto);

                //Set photo filename
                $filename = $_POST['Persona']['dni'].'.png';
                $filepath = YiiBase::getPathOfAlias("webroot").'/fotografias/'.$filename;
                $writeToDisk = file_put_contents($filepath, $data_foto);

                //var_dump($cadena_foto);
                //Yii::app()->end();
            }
			$model->attributes=array_map('strtoupper',$_POST['Persona']);
            $model->fotografia=$filename;

			if($model->save())
				$this->redirect(array('update','id'=>$model->id));

		}

		$this->render('create',array(
			'model'=>$model,
            'paciente'=>$paciente,
		));

	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
    public function actionCrearcontacto()
    {
        $Percontacto=new Persona;
        if(isset($_POST['Persona']))
        {
            $Percontacto->attributes=array_map('strtoupper',$_POST['Persona']);
            $Percontacto->save();
        }
        header('Content-Type:application/json;');
        echo CJSON::encode(array('success'=>true,'nombre_contacto'=>$Percontacto->GetNombreCompleto(),'id_contacto'=>$Percontacto->id));
    }
    public function actionCrearpaciente()
    {
        $infopaciente=new Paciente;
        $historial=new HistorialPaciente();
        if(isset($_POST['Paciente']))
        {
            $infopaciente->id_paciente=((int)$_POST['Paciente']['id_paciente']);
            $infopaciente->attributes=array_map('strtoupper',$_POST['Paciente']);
            if($infopaciente->save()){
                $historial->id_historial=$infopaciente->id_paciente;
                $historial->save();
                $this->redirect(array('index'));
            }
        }
    }
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $contacto=new Persona;
        $paciente=new Paciente;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Persona']))
		{
            $filename=$_POST['Persona']['fotografia'];
            if(strlen($_POST['Persona']['fotografia'])>128)
            {
                $foto = $_POST['Persona']['fotografia'];
                $foto = str_replace('data:image/png;base64,', '', $foto);
                $foto = str_replace(' ', '+', $foto);
                $data_foto = base64_decode($foto);
                //Set photo filename
                $filename = $_POST['Persona']['dni'].'.png';
                $filepath = YiiBase::getPathOfAlias("webroot").'/fotografias/'.$filename;
                $writeToDisk = file_put_contents($filepath, $data_foto);
            }
            $model->attributes=array_map('strtoupper',$_POST['Persona']);
            $model->fotografia=$filename;
			if($model->save()){
                if($model->paciente!=null)
                   $this->redirect(array('update','id'=>$model->id));
                else
                    $this->redirect(array('index'));
            }
		}

		$this->render('update',array(
			'model'=>$model,
            'paciente'=>$paciente,
            'contacto'=>$contacto,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
    public function action_form_Updatepa($id){
        $model=$this->loadModel($id);
        $paciente=$this->loadModelpaciente($id);
        $contacto=new Persona;
        if(isset($_POST['Persona']))
        {
            $filename=$_POST['Persona']['fotografia'];
            if(strlen($_POST['Persona']['fotografia'])>128)
            {
                $foto = $_POST['Persona']['fotografia'];
                $foto = str_replace('data:image/png;base64,', '', $foto);
                $foto = str_replace(' ', '+', $foto);
                $data_foto = base64_decode($foto);
                //Set photo filename
                $filename = $_POST['Persona']['dni'].'.png';
                $filepath = YiiBase::getPathOfAlias("webroot").'/fotografias/'.$filename;
                $writeToDisk = file_put_contents($filepath, $data_foto);
            }
            $model->attributes=array_map('strtoupper',$_POST['Persona']);
            $model->fotografia=$filename;
            if($model->save()){
                $this->redirect(array('_form_updatepa','id'=>$model->id));
            }
        }
        if(isset($_POST['Paciente']))
        {
            $paciente->attributes=array_map('strtoupper',$_POST['Paciente']);
            if($paciente->save()){
                $this->redirect(array('HistorialPaciente/view','id'=>$paciente->id_paciente));
            }
        }
        $this->render('_form_updatepa',array(
            'model'=>$model,
            'paciente'=>$paciente,
            'contacto'=>$contacto,
        ));
    }
    public function action_form_Updateper($id){
        $model=$this->loadModel($id);
        if(isset($_POST['Persona']))
        {
            $filename=$_POST['Persona']['fotografia'];
            if(strlen($_POST['Persona']['fotografia'])>128)
            {
                $foto = $_POST['Persona']['fotografia'];
                $foto = str_replace('data:image/png;base64,', '', $foto);
                $foto = str_replace(' ', '+', $foto);
                $data_foto = base64_decode($foto);
                //Set photo filename
                $filename = $_POST['Persona']['dni'].'.png';
                $filepath = YiiBase::getPathOfAlias("webroot").'/fotografias/'.$filename;
                $writeToDisk = file_put_contents($filepath, $data_foto);
            }
            $model->attributes=array_map('strtoupper',$_POST['Persona']);
            $model->fotografia=$filename;
            if($model->save()){
                    $this->redirect(array('index'));
            }
        }
        $this->render('_form_updateper',array(
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
	public function actionIndex()
	{
        $listaPersonas=Persona::model()->findAll(array(
            'order'=>'id DESC'
        ));
		$this->render('index',array(
            'listaPersonas'=>$listaPersonas,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Persona('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persona']))
			$model->attributes=$_GET['Persona'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Persona the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Persona::model()->findByPk($id);
        $paciente=Paciente::model()->findByPk($id);
		if($model===null &&$paciente===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function loadModelpaciente($id)
    {
        $paciente=Paciente::model()->findByPk($id);
        if($paciente===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $paciente;
    }
	/**
	 * Performs the AJAX validation.
	 * @param Persona $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='persona-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionBuscarPersonaAjax(){
        $codigo= $_POST['cadena'];
        $listaPersonas=Persona::model()->findAll(array(
            'condition'=>"codigo like '%{$codigo}%'",
            'order'=>'id DESC'
        ));
        if($listaPersonas==null){
            echo 'No se han encontrado resultados';
        }
        return $this->renderPartial('_listaPersonas',array(
            'listaPersonas'=>$listaPersonas,
        ));
    }
}
