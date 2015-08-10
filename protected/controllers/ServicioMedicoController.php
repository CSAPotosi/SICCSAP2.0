<?php

class ServicioMedicoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    private $_categoria=null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            'categoriaContext + createServicio',
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
				'actions'=>array('index','view','create','update','createServicio','admin','delete'),
                'ROLES'=>array('ADMIN'),
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
        $servicios=new CActiveDataProvider('ServicioMedico',array(
            'criteria'=>array(
                'condition'=>"id_categoria_serv={$id}",
                'order'=>'id_servicio_medico DESC',
            ),
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'servicios'=>$servicios,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CategoriaServicio;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CategoriaServicio']))
		{
			$model->attributes=$_POST['CategoriaServicio'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_categoria_serv));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

    public function actionCreateServicio(){
        $servicio= new ServicioMedico;
        $costoServicio= new Costos;
        $servicio->id_categoria_serv=$this->_categoria->id_categoria_serv;
        if(isset($_POST['ServicioMedico'],$_POST['Costos'])){
            $servicio->attributes=$_POST['ServicioMedico'];
            $costoServicio->attributes=$_POST['Costos'];
            if($servicio->validate()&&$costoServicio->validate()){
                $servicio->save();
                $costoServicio->id_servicio=$servicio->id_servicio_medico;
                $costoServicio->save();
                $this->redirect(array('view','id'=>$servicio->id_categoria_serv));
            }

        }

        $this->render('createServicio',array(
            'servicio'=>$servicio,
            'costoServicio'=>$costoServicio,
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

		if(isset($_POST['CategoriaServicio']))
		{
			$model->attributes=$_POST['CategoriaServicio'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_categoria_serv));
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
		$dataProvider=new CActiveDataProvider('CategoriaServicio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CategoriaServicio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CategoriaServicio']))
			$model->attributes=$_GET['CategoriaServicio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CategoriaServicio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CategoriaServicio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CategoriaServicio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categoria-servicio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function filterCategoriaContext($filterChain){
        $categoriaid=null;
        if(isset($_GET['csid']))
            $categoriaid=$_GET['csid'];
        else
            if(isset($_POST['csid']))
                $categoriaid=$_POST['csid'];
        $this->loadCategoria($categoriaid);
        $filterChain->run();
    }

    protected function loadCategoria($csid){
        if($this->_categoria==null){
            $this->_categoria=CategoriaServicio::model()->findByPk($csid);
            if($this->_categoria==null)
                throw new CHttpException(404,'La categoria que seleccionaste no es valida');
        }
        return $this->_categoria;
    }
}
