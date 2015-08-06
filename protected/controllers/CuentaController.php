<?php

class CuentaController extends Controller
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
				'actions'=>array('create','update','delete','borrar','getSubcuenta','getSubcuenta2','getnumcuenta'),
				'roles'=>array('superuser'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin','luis','lui'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
            array('allow',
                'actions'=>array(view),
                'role'=>'viewcuenta'
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
	public function actionCreate($id=null)
	{
        /****   creacion de codigo de cuenta automatico en la variable $var   ****/
        if($id!=null)
        {
            $criteria=new CDbCriteria;
            $codigo = addcslashes($id, '%_');
            $criteria->select='max(codigo) AS codigo';
            $criteria->condition="codigo like :codigo";
            if(strlen($id)<3)
                $criteria->params=array(':codigo'=>"$codigo"."_");
            else
                $criteria->params=array(':codigo'=>"$codigo"."__");
            $model=Cuenta::model()->find($criteria);
            $var=$model['codigo'];
            if($var==null)
            {
                if(strlen($id)<3)
                    $var=$id."1";
                else
                    $var=$id."01";
            }
            else
                $var=(string)$var+1;
        }
        /***********************************************************************/
		$model=new Cuenta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        if(isset($_POST['Cuenta']))
        {
            $model->attributes=$_POST['Cuenta'];
            $model->estado='1';
            if($model->save())
                $this->redirect(array('index','id'=>$model->id_cuenta));
        }
        if($id!=null)
            $model->codigo=$var;
        else
            $model->codigo=null;
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

		if(isset($_POST['Cuenta']))
		{
			$model->attributes=$_POST['Cuenta'];
			if($model->save())
				$this->redirect(array('index'));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

    public function actionBorrar($id)
    {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Cuenta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
        /**************************/
        $criteria2=new CDbCriteria;
        $criteria2->addCondition("codigo like '_'");
        $criteria2->order='codigo ASC';
        $cPrincipales=Cuenta::model()->findAll($criteria2);
        /**************************/
        $cuentas=array();
        foreach($cPrincipales as $value)
        {
            $criteria=new CDbCriteria;
            $criteria->addCondition("estado='1'");
            $criteria->addCondition("codigo like '$value->codigo%'");
            $sort=new CSort();
            $sort->defaultOrder='codigo ASC';
            $dataProvider=new CActiveDataProvider('Cuenta',array('criteria'=>$criteria,'sort'=>$sort,'pagination'=>array('pageSize'=>50)));
            $cuentas[$value->nombre]=$dataProvider;
        }
        /************************/
        $criteria3=new CDbCriteria;
        $criteria3->addCondition("estado='1'");
        $sort2=new CSort();
        $sort2->defaultOrder='codigo ASC';
        $totalCuentas=new CActiveDataProvider('Cuenta',array('criteria'=>$criteria3,'sort'=>$sort2,'pagination'=>array('pageSize'=>50)));
        /*
        $totalCuentas=new Cuenta('search');
        $totalCuentas->unsetAttributes();  // clear any default values
        if(isset($_GET['totalCuentas']))
            $totalCuentas->attributes=$_GET['totalCuentas'];
        /*****************/
        $this->render('index',array(
            'cuentas'=>$cuentas,
            'totalCuentas'=>$totalCuentas,
            'cPrincipales'=>$cPrincipales,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cuenta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cuenta']))
			$model->attributes=$_GET['Cuenta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cuenta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cuenta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cuenta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cuenta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    /*
    public function actionGetSubcuenta()
    {
        if(strlen($_POST["nivel"])<3)
            $list=Cuenta::model()->findAll(['condition'=>"codigo like '{$_POST["nivel"]}_' and estado='1'"]);
        else
            $list=Cuenta::model()->findAll(['condition'=>"codigo like '{$_POST["nivel"]}__' and estado='1'"]);

        echo "<option selected disabled hidden value=''> --Seleccione-- </option>";
        foreach($list as $data)
            echo "<option value=\"{$data->codigo}\">{$data->nombre}</option>";
    }
    */
    public function actionGetSubcuenta()
    {
        if(strlen($_POST["nivel"])<3)
            $list=Cuenta::model()->findAll(['condition'=>"codigo like '{$_POST["nivel"]}_' and estado='1'"]);
        else
            $list=Cuenta::model()->findAll(['condition'=>"codigo like '{$_POST["nivel"]}__' and estado='1'"]);
        if($list!=null)
        {
            switch(strlen($_POST["nivel"]))
            {
                case 1:echo "<option selected disabled hidden value=''>-- GRUPO --</option>";break;
                case 2:echo "<option selected disabled hidden value=''>-- SUBGRUPO --</option>";break;
                case 3:echo "<option selected disabled hidden value=''>-- PRINCIPAL --</option>";break;
                case 4:echo "<option selected disabled hidden value=''>-- SUBCUENTA --</option>";break;
            }
            foreach($list as $data)
                echo "<option value=\"{$data->codigo}\">{$data->nombre}</option>";
        }
        else
            echo "<option selected disabled hidden value=''>-- NO EXISTEN MAS CUENTAS --</option>";
    }

    public function actionGetnumcuenta()
    {
        $criteria=new CDbCriteria;
        $codigo = addcslashes($_POST["cod"], '%_');
        $criteria->select='max(codigo) AS codigo';
        $criteria->condition="codigo like :codigo";
        if(strlen($_POST["cod"])<3)
            $criteria->params=array(':codigo'=>"$codigo"."_");
        else
            $criteria->params=array(':codigo'=>"$codigo"."__");
        $model=Cuenta::model()->find($criteria);
        $var=$model['codigo'];
        if($var==null)
        {
            if(strlen($_POST["cod"])<3)
                $var=$_POST["cod"]."1";
            else
                $var=$_POST["cod"]."01";
        }
        else
            $var=(string)$var+1;
        echo $var;
    }
}
