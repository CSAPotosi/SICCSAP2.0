<?php

class AgendaController extends Controller
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
				'actions'=>array('index','view','BuscarAtencionMedica','RegistrarCita','ActualizarEstadoCita','ComprobanteAtencionMedica','atencionesmedicas','detalleAtencionesMedicas','BuscarAtencionMedicaRapida','create','update','admin','delete','RegistrarCitas','ChangeStateCita'),
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
		$model=new Cita;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cita']))
		{
			$model->attributes=array_map('strtoupper',$_POST['Cita']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_cita));
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

		if(isset($_POST['Cita']))
		{
            $model->attributes=array_map('strtoupper',$_POST['Cita']);

			if($model->save()){

            }
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
	public function actionIndex($id)
	{
        $cita= new Cita;
        $atencionmedica=AtencionMedica::model()->findAll();
        $persona=Persona::model()->findByPk($id);
		$this->render('index',array(
			'atencionmedica'=>$atencionmedica,
            'cita'=>$cita,
            'persona'=>$persona,
		));
	}
	public function actionAdmin()
	{
		$model=new Cita('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cita']))
			$model->attributes=$_GET['Cita'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cita the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cita::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function actionBuscarAtencionMedica(){
        $nombre= $_POST['cadena'];
        $listaServicio=Servicio::model()->findAll(array(
            'condition'=>"nombre_serv like '%{$nombre}%'",
        ));
        $atencionmedica=array();
        if($listaServicio!=null){
            foreach($listaServicio as $list):
                if($list->atencionMedica!=null){
                    $atencionmedica[]=$list->atencionMedica;
                }
            endforeach;
        }
        $this->renderPartial('atencionesdisponibles',array('atencionmedica'=>$atencionmedica));
    }
	/**
	 * Performs the AJAX validation.
	 * @param Cita $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cita-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionRegistrarCita(){
        $cita=new Cita;
        $persona=Persona::model()->findByPk($_POST['Persona']['id']);
        if(isset($_POST['Cita'])){
            $cita->attributes=$_POST['Cita'];
            $cita->id_paciente=$_POST['Persona']['id'];
            $datetime=$cita->fecha." ".$cita->hora_cita;
            $datefin=date("Y-m-d H:i",strtotime("+15 minute",strtotime($datetime)));
            $titulo=$persona->nombreCompleto;
            $atencion=$cita->medicoConsultaServicio->idServicio->nombre_serv;
            if($cita->save()){
                header('Content-Type:application/json;');
                echo CJSON::encode(array('id'=>$cita->id_cita,'start'=>$datetime,'end'=>$datefin,'title'=>$titulo,'editable'=>false,'estado'=>$cita->estado_cita,'servinombre'=>$atencion,'paciente'=>$cita->id_paciente,'className'=>'popoverclass'));
                return;
            }
        }
        $this->renderPartial('_form',array('cita'=>$cita,'persona'=>$persona));
        return;
    }
    public function actionActualizarEstadoCita(){
        $cita=Cita::model()->findByPk($_GET['cita']);
        $cita->estado_cita=1;
        $cita->save();
        $citas= new Cita;
        $atencionmedica=AtencionMedica::model()->findAll();
        $persona=Persona::model()->findByPk($_GET['idpaciente']);
        $this->render('index',array(
            'atencionmedica'=>$atencionmedica,
            'cita'=>$citas,
            'persona'=>$persona,
        ));
    }
    public function actionComprobanteAtencionMedica(){
        $cita=Cita::model()->findByPk($_GET['id']);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->render('/agenda/comprobanteatencionmedica',['cita'=>$cita],true));
        $mPDF1->Output();
    }
    public function actionatencionesmedicas(){
        $atencion=AtencionMedica::model()->findAll();
        $this->render('atencionesmedicas',array('atencion'=>$atencion));
    }
    public function actiondetalleAtencionesMedicas($id){
        $servicio=Servicio::model()->findByPk($id);
        $atencion=AtencionMedica::model()->findAll(array(
            'condition'=>"id_servicio='{$servicio->id_servicio}'",
        ));
        foreach($atencion as $ate):
            $atencionmedica=$ate;
        endforeach;
        $this->renderPartial('detalleatencionmedica',array('servicio'=>$servicio,'atencionmedica'=>$atencionmedica));
        return;
    }
    public function actionRegistrarCitas(){
        $atencion=AtencionMedica::model()->findAll();
        $this->render('registrarcitas',array('atencionmedica'=>$atencion));
    }
    public function actionChangeStateCita($id)
    {

        $modelQ= Cita::model()->findByPk($id);
        var_dump($modelQ);
        $modelQ->estado_atencion=($modelQ->estado_atencion+1)%2;
        if($modelQ->save())
            var_dump($modelQ);
        else
            echo "no se puede";
        echo $id.$modelQ->estado_atencion;
    }
}
