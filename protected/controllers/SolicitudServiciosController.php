<?php

class SolicitudServiciosController extends Controller
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
				'actions'=>array('index','view','CrearSolDetSer','Detalleservicios'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
	public function actionCreate($id)
	{
        $solicitud=new SolicitudServicios;
        $detsolser=new DetalleSolicitudServicio;
        $historial=HistorialPaciente::model()->findByPk($id);
        $histo=$historial->id_historial;
		$this->render('create',array(
            'detsolser'=>$detsolser,
            'solicitud'=>$solicitud,
            'historial'=>$histo,
		));
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolicitudServicios']))
		{
            $model->attributes=array_map('strtoupper',$_POST['SolicitudServicios']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_solicitud));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    public function actionCrearSolDetSer()
    {
        $solicitud=new SolicitudServicios;
        $solicitud->attributes=$_POST['SolicitudServicios'];
        $solicitud->total=$_POST['SolicitudServicios']['total'];
        $solicitud->save();
        header('Content-Type:application/json;');
        echo CJSON::encode(array('success'=>true,'id_solicitud_j'=>$solicitud->id_solicitud));
    }
    public function actionDetalleservicios(){
        $detalles=array();
        $detalles=$_POST['DetalleSolicitudServicio'];
        foreach($detalles as $det):
            $detalle=new DetalleSolicitudServicio;
            $detalle->attributes=$det;
            $detalle->save();
        endforeach;
        $this->redirect(array('Persona/index'));
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
		$dataProvider=new CActiveDataProvider('SolicitudServicios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SolicitudServicios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SolicitudServicios']))
			$model->attributes=$_GET['SolicitudServicios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SolicitudServicios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SolicitudServicios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SolicitudServicios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitud-servicios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
