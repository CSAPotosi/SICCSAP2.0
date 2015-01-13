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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','crearMedicos','CrearEspecialidad'),
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
        $modelE=new Especialidad;
        $items=$this->getItems();
		$model=new Persona;
        $modelM=new Medico;
        $modelH=new HistorialPaciente;
        $empleado=new Empleado;
        $asignacion_empleado=new AsignacionEmpleado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['Persona']))||(isset($_POST['Persona/_formMedico'])))
		{

            $model->attributes=array_map('strtoupper',$_POST['Persona']);

            //var_dump($model);
            //Yii::app()->end();
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'modelM'=>$modelM,
            'items'=>$items,
            'modelE'=>$modelE,
            'modelH'=>$modelH,
            'empleado'=>$empleado,
            'asignacion_empleado'=>$asignacion_empleado,
		));
	}
    public function actionActualizarEs()
    {
        $model=new Especialidad();
        $lista=CHtml::listData($model,'id_especialidad','nombre_especialidad');
        foreach($lista as $valor=> $descripcion)
        {
            echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
        }
    }
    public function getItems(){
        $items=array();
        if(isset($_POST['MedicoEspecialidad'])&&is_array($_POST['MedicoEspecialidad'])){
            foreach($_POST['MedicoEspecialidad'] as $item){
                if ( array_key_exists('id_medico', $item) ){
                    $items[] = MedicoEspecialidad::model()->findByPk($item['id_medico']);
                }
                // Otherwise create a new record
                else {
                    $items[] = new MedicoEspecialidad;
                }
            }

        }
        return $items;
    }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Persona']))
		{
			$model->attributes=array_map('strtoupper',$_POST['Persona']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
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
		$dataProvider=new CActiveDataProvider('Persona');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
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
    public function actionCrearEspecialidad()
    {
        $modelE=new Especialidad;
        if(isset($_POST['Especialidad']))
        {
            $modelE->attributes=$_POST['Especialidad'];
            $modelE->save();

        }
    }
}
