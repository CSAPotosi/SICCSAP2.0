<?php

class RolController extends Controller
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
				'actions'=>array('admin','delete','view','create','update','index','addchild','assign'),
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
		$model=new Rol;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $auth=Yii::app()->authManager;
		if(isset($_POST['Rol']))
		{
            $model->attributes=$_POST['Rol'];
            switch($_POST['Rol']['type'])
            {
                case '2':if($auth->createRole(strtoupper ( $model->name ),strtoupper ( $model->description ))) $this->redirect(/*array('view','id'=>$model->name)*/array('create'));break;
                case '1':if($auth->createTask(strtoupper ( $model->name ),strtoupper ( $model->description ))) $this->redirect(/*array('view','id'=>$model->name)*/array('create'));break;
                case '0':if($auth->createOperation(strtoupper ( $model->name ),strtoupper ( $model->description ))) $this->redirect(/*array('view','id'=>$model->name)*/array('create'));break;
            }
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

		if(isset($_POST['Rol']))
		{
			$model->attributes=$_POST['Rol'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->name));
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
        $roles=Rol::model()->findAll("type='2' order by name asc");
        $tareas=Rol::model()->findAll("type='1' order by name asc");
        $operaciones=Rol::model()->findAll("type='0' order by name asc");

        $this->render('index', array(
            'roles' => $roles,
            'tareas' => $tareas,
            'operaciones'=>$operaciones,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rol('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rol']))
			$model->attributes=$_GET['Rol'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rol the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rol::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rol $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='auth-item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAssign()
    {
        if(isset($_GET['id']))
        {
            $roles=Rol::model()->findAll("type=2 and name not in (select itemname from asignacion_rol where userid='{$_GET['id']}')");
            $tareas=Rol::model()->findAll("type=1 and name not in (select itemname from asignacion_rol where userid='{$_GET['id']}')");
            $operaciones=Rol::model()->findAll("type=0 and name not in (select itemname from asignacion_rol where userid='{$_GET['id']}')");
        }
        else
        {
            $roles=Rol::model()->findAll("type=2");
            $tareas=Rol::model()->findAll("type=1");
            $operaciones=Rol::model()->findAll("type=0");
        }
            $items=Rol::model()->findAll();
        $auth=Yii::app()->authManager;
        $usuarios=new Usuario('search');
        $usuarios->unsetAttributes();


        if(isset($_GET['id']))
            $usuarios=Usuario::model()->find('id_usuario=:id',array(':id'=>$_GET['id']));

        /***************************************/
        if(isset($_POST['roles'])and isset($_POST['idusuario']))
        {
            foreach($_POST['roles'] as $item)
            {
                $auth->assign($item,$_POST['idusuario']);
            }
            $this->redirect(array("usuario/view",'id'=>$_POST['idusuario']));
        }
        $this->render('assign',array(
            'usuarios'=>$usuarios,
            'roles'=>$roles,
            'tareas'=>$tareas,
            'operaciones'=>$operaciones,
        ));
    }

    public function actionAddChild()
    {
        $items=Rol::model()->findAll("type!=0");
        $auth=Yii::app()->authManager;
        $roles=Rol::model()->findAll("type=2");
        $tareas=Rol::model()->findAll("type=1");
        $operaciones=Rol::model()->findAll("type=0");
        if(isset($_GET["id"]))
            $roles=Rol::model()->find('name=:name',array('name'=>$_GET["id"]));
        /***************************************/
        if(isset($_POST['roles'])and isset($_POST['nombrerol']))
        {
            foreach($_POST['roles'] as $item)
            {
                $auth->addItemChild($_POST['nombrerol'],$item);
            }
            $this->redirect(array("index"));
        }

        $this->render('addchild',array(
            'items'=>$items,
            'roles'=>$roles,
            'tareas'=>$tareas,
            'operaciones'=>$operaciones,
        ));
    }

    /**************************************/
    public function getUsuarios()
    {
        return CHtml::listData(Usuario::model()->findAll(),'id_usuario','nombre');
    }

    public function getRoles()
    {
        return CHtml::listData(Rol::model()->findAll(),'name','name');
    }
}
