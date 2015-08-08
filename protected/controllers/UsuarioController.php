<?php

class UsuarioController extends Controller
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
				'actions'=>array('index','view','listarPersona'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','luis'),
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
		$model=new Usuario;

        /*$personas=new Persona('search');
        $personas->unsetAttributes();  // clear any default values
        if(isset($_GET['Persona']))
            $personas->attributes=$_GET['Persona'];
        $personas2=Persona::model()->findAll();*/

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
            $model->clave=md5($model->clave);
            $model->estado=1;
            $model->fecha_ingreso=date("Y-m-d");
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usuario));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_usuario));
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
	public function actionIndex($start=0,$block=5)
	{
        /*
        $auth=Yii::app()->authManager;
        $auth->createOperation('editar_usuario','esta operacion sirve para usuario');
        $tash=$auth->createTask('tarea_edicion','tarea para editar');
        $tash->addChild('editar_usuario');
        $rol=$auth->createRole('rol_edicion','rol para editar');
        $rol->addChild('tarea_edicion');
        $auth->assign('rol_edicion',Yii::app()->user->id);
        */


        $criteria=new CDbCriteria;
        $criteria->limit=$block;
        $criteria->offset=$start;
		$usuarios=Usuario::model()->findAll($criteria);
        $total=Usuario::model()->count();
		$this->render('index',array(
			'usuarios'=>$usuarios,
            'start'=>$start,
            'block'=>$block,
            'total'=>$total,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La pagina solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end()
    ;
		}
	}


    /****************************************************************************/
    public function actionListarPersona()
    {
        $dni=$_POST["dni"];
        $nombres=$_POST["nombres"];
        $apellido1=$_POST["apellido1"];
        $apellido2=$_POST["apellido2"];

        $criteria=new CDbCriteria();
        $criteria->join="LEFT JOIN empleado as e ON(e.id=t.id) LEFT JOIN medico as m ON(m.id=t.id)
                         where (e.id is not null or m.id is not null)
                         and t.dni like '%$dni%'
                         and t.nombres like '%$nombres%'
                         and t.primer_apellido like '%$apellido1%'
                         and t.segundo_apellido like '%$apellido2%'";

        $personas=Persona::model()->findAll($criteria);
        echo CJSON::encode($personas);
    }
    /***************************************************************************/
}