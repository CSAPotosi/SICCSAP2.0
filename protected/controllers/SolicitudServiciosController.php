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
				'actions'=>array('index','view','CrearSolDetSer','Detalleservicios','reporteSolicitud','Listasolicitudser','Detalleserviciosconsulta','reporteOrdenlab','reporteOrdenGab','OrdenInternacion','DetalleServiciosInternacion','Verdetallesolicitud','ListaDetalleSolicitudInternacion','VerServiciosInternacion','create','update','admin','delete'),
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
    public function actionListasolicitudser(){
         $this->render('listardetallesolicitud1');
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
        $detalle=null;
        $detalles=$_POST['DetalleSolicitudServicio'];

        foreach($detalles as $det):
            $detalle=new DetalleSolicitudServicio;
            $detalle->attributes=$det;
            $detalle->save();
        endforeach;

        $solicitud=SolicitudServicios::model()->findByPk($detalle->id_solicitud);
        $this->render('solicitudcompleto',array('solicitud'=>$solicitud,));
    }
    public function actionDetalleserviciosconsulta(){
        $detalles=array();
        $detalles=null;
        $detalles=$_POST['DetalleSolicitudServicio'];
        foreach($detalles as $det):
            $detalle=new DetalleSolicitudServicio;
            $detalle->attributes=$det;
            $detalle->save();
        endforeach;
        $solicitud=SolicitudServicios::model()->findByPk($detalle->id_solicitud);
        $this->render('ordencompleto',array('solicitud'=>$solicitud,));
    }
    public function actionreporteSolicitud($id){
        $solicitud=SolicitudServicios::model()->findByPk($id);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->render('/reportesolicitudservicios/comprobantedetallesolicitud',['solicitud'=>$solicitud],true));
        $mPDF1->Output();
    }
    public function actionreporteOrdenlab($id){
        $solicitud=SolicitudServicios::model()->findByPk($id);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->render('/reportesolicitudservicios/comprobantedetalleorden',['solicitud'=>$solicitud],true));
        $mPDF1->Output();
    }
    public function actionreporteOrdenGab($id,$ser){
        $solicitud=SolicitudServicios::model()->findByPk($id);
        $detalle=DetalleSolicitudServicio::model()->findAll(array(
           'condition'=>"id_solicitud='{$id}' and id_servicio='{$ser}'"
        ));
        foreach($detalle as $det):
            $deta=$det;
        endforeach;
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->render('/reportesolicitudservicios/comprobantedetalleordengab',['solicitud'=>$solicitud,'detalle'=>$deta],true));
        $mPDF1->Output();
    }
    public function actionOrdenInternacion($id,$id_inter=0){
        $historial=HistorialPaciente::model()->findByPk($id);
        $modelInternacion=Internacion::model()->findByPk($id_inter);
        $detalle=new DetalleSolicitudServicio;
        $solicitud=new SolicitudServicios;
        $this->render('solicitudInternacion',array(
            'historial'=>$historial->id_historial,
            'modelInternacion'=>$modelInternacion,
            'detsolser'=>$detalle,
            'solicitud'=>$solicitud,
        ));
    }
    public  function actionDetalleServiciosInternacion(){
        $detalles=array();
        $detalles=null;
        $detalles=$_POST['DetalleSolicitudServicio'];
        foreach($detalles as $det):
            $detalle=new DetalleSolicitudServicio;
            $detalle->attributes=$det;
            !$detalle->save();

        endforeach;
        $sol=SolicitudServicios::model()->findByPk($detalle->id_solicitud);
        $this->redirect(array('ListaDetalleSolicitudInternacion','sol'=>$sol->id_solicitud));
    }
    public function actionListaDetalleSolicitudInternacion($sol){
        $sol=SolicitudServicios::model()->findByPk($sol);
        $var=$sol->idHistorial->internacionActual->fecha_ingreso;
        $varhis=$sol->idHistorial->id_historial;
        $historial=$sol->idHistorial;
        $solicitud=SolicitudServicios::model()->findAll(array(
            'condition'=>"fecha_solicitud>='{$var}'",
        ));
        $this->render('listadetallesolicitudservicio',array('solicitud'=>$solicitud,'historial'=>$historial));
    }
    public function actionVerdetallesolicitud($id){
        $solicitud=SolicitudServicios::model()->findByPk($id);
        if($solicitud!=null)
        $this->render('versolicituddetalleinteenacion',array('solicitud'=>$solicitud));

    }
    public function actionVerServiciosInternacion($id,$id_inter=0){
        $historial=HistorialPaciente::model()->findByPk($id);
        $modelInternacion=Internacion::model()->findByPk($id_inter);
        $var=$historial->internacionActual->fecha_ingreso;
        $solicitud=SolicitudServicios::model()->findAll(array(
            'condition'=>"fecha_solicitud>='{$var}' and id_historial='{$historial->id_historial}'",
        ));
       $this->render('listadetallesolicitudservicio',array('solicitud'=>$solicitud,'historial'=>$historial,'modelInternacion'=>$modelInternacion));
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
