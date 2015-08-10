<?php

class ConvenioInstitucionController extends Controller
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
				'actions'=>array('index','view','Principal_Institucion','CrearInstitucion','ActualizarInstitucion','EliminarInstitucion','CrearConvenioInstitucion','ActualizarConvenioInstitucion','EliminarConvenioInstitucion','VerServiciosConvenio','ListaServiciosInstitucion','CrearConveniosServicios','ChangeStateConvenio','SegurospacientesIndex','changeTipoPaciente','CrearSeguroPaciente','ChangeStateAsegurado','create','update','admin','delete'),
                'ROLES'=>array('ADMINISTRAR_SEGUROS','ADMIN'),
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
		$model=new ConvenioInstitucion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConvenioInstitucion']))
		{
			$model->attributes=array_map('strtoupper',$_POST['ConvenioInstitucion']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_convenio));
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

		if(isset($_POST['ConvenioInstitucion']))
		{
            $model->attributes=array_map('strtoupper',$_POST['ConvenioInstitucion']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_convenio));
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
		$institucion=new Institucion;
        $convenio_insti=new ConvenioInstitucion;
        $listaConveniosInsti=ConvenioInstitucion::model()->findAll(array(
            'order'=>"id_convenio ASC",
        ));
		$this->render('index',array(
			'institucion'=>$institucion,
            'convenio_insti'=>$convenio_insti,
            'listaconvenioinsti'=>$listaConveniosInsti,
		));
	}

	public function actionAdmin()
	{
		$model=new ConvenioInstitucion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConvenioInstitucion']))
			$model->attributes=$_GET['ConvenioInstitucion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ConvenioInstitucion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ConvenioInstitucion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ConvenioInstitucion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='convenio-institucion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionPrincipal_Institucion(){
        $institucion=new Institucion;
        $listainstitucion=Institucion::model()->findAll(array(
            'order'=>"id_insti ASC"
        ));
        $this->render('form_institucion',array(
            'institucion'=>$institucion,
            'listainstitucion'=>$listainstitucion,
        ));
    }
    public function actionCrearInstitucion(){
        $institucion=new Institucion;
        if(isset($_POST['Institucion'])){
            $institucion->attributes=$_POST['Institucion'];
            if($institucion->save()){
                $this->redirect(array('/ConvenioInstitucion/Principal_Institucion'));
            }
        }
        $listainstitucion=Institucion::model()->findAll(array(
            'order'=>"id_insti ASC",
        ));
        $this->render('form_institucion',array(
            'institucion'=>$institucion,
            'listainstitucion'=>$listainstitucion,
        ));
    }
    public function actionActualizarInstitucion($id){
        $institucion=Institucion::model()->findByPk($id);
        if(isset($_POST['Institucion'])){
            $institucion->attributes=$_POST['Institucion'];
            if($institucion->save()){
                $this->redirect(array('/ConvenioInstitucion/Principal_Institucion'));
            }
        }
        $listainstitucion=Institucion::model()->findAll(array(
            'order'=>"id_insti ASC",
        ));
        $this->render('form_institucion',array(
            'institucion'=>$institucion,
            'listainstitucion'=>$listainstitucion,
        ));
    }
    public function actionEliminarInstitucion($id){
        $institucion=Institucion::model()->findByPk($id);
        $institucion->delete();
        $this->redirect(array('/ConvenioInstitucion/Principal_Institucion'));
    }
    public function actionCrearConvenioInstitucion(){
        $conve_insti=new ConvenioInstitucion;
        if(isset($_POST['ConvenioInstitucion'])){
            $conve_insti->attributes=$_POST['ConvenioInstitucion'];
            if($conve_insti->save()){
                $this->redirect(array('/ConvenioInstitucion/index'));
            }
        }
        $this->render('index',array('convenio_insti'=>$conve_insti,));
    }
    public function actionActualizarConvenioInstitucion($id){
        $convenioInsti=ConvenioInstitucion::model()->findByPk($id);
        if(isset($_POST['ConvenioInstitucion'])){
            $convenioInsti->attributes=$_POST['ConvenioInstitucion'];
            if($convenioInsti->save()){
                $this->redirect(array('/ConvenioInstitucion/index'));
            }
        }
        $listaconvenioinsti=ConvenioInstitucion::model()->findAll(array(
            'order'=>"id_convenio ASC",
        ));
        $this->render('index',array(
            'convenio_insti'=>$convenioInsti,
            'listaconvenioinsti'=>$listaconvenioinsti,
        ));
    }
    public function actionEliminarConvenioInstitucion($id){
        $convenioinsti=ConvenioInstitucion::model()->findByPk($id);
        $convenioinsti->delete();
        $listaconvenioinsti=ConvenioInstitucion::model()->findAll(array(
            'order'=>"id_convenio ASC",
        ));
        $this->redirect(array('/ConvenioInstitucion/index'));
    }
    public function actionVerServiciosConvenio($id){
        $convenio=ConvenioInstitucion::model()->findByPk($id);
        $listaconvenioservicio=ConvenioServicios::model()->findAll(array(
            'condition'=>"id_convenio_institucion='{$id}'",
            'order'=>"id_servicio ASC",
        ));
        $this->renderPartial('listarConvenioServicio',array('listaconvenioservicio'=>$listaconvenioservicio,'convenio'=>$convenio));
    }
    public function actionListaServiciosInstitucion(){
        $convenio=$_POST['convenio'];
        $convenioservicios=new ConvenioServicios;
        $listaconvenios=array();
        $listaservicio=Servicio::model()->findAll("id_servicio not in (select id_servicio from convenio_servicios where id_convenio_institucion={$convenio})");
        $this->renderPartial('listaservicio',array(
            'listaservicio'=>$listaservicio,
            'convenio'=>$convenio,
            'ConvenioServicios'=>$convenioservicios,
            'listaconvenios'=>$listaconvenios,
        ));
    }
    public function actionCrearConveniosServicios(){
        $conveniosservicios=array();
        $conveniosservicios=$_POST['ConvenioServicios'];
        $list=array();
        $servicioslist=array();
        foreach($conveniosservicios as $con):
            $validcon=new ConvenioServicios;
            $validcon->attributes=$con;
            $servicioslist[]=$validcon->idServicio;
            $list[]=$validcon;
            $convenio=$validcon->id_convenio_institucion;
        endforeach;
        $valid=$this->validar($list);
        if($valid){
            foreach($conveniosservicios as $conv):
                $convenioser=new ConvenioServicios;
                $convenioser->attributes=$conv;
                $convenioser->save();
            endforeach;
        }
        else{
            $this->renderPartial('listaconveniosaRegistrar',array(
                'listaconvenios'=>$list,
                'listaservicio'=>$servicioslist,
                'CovenioServicios'=>$list,
                'convenio'=>$convenio,
            ));
            return;
        }
        $convenio_insti=ConvenioInstitucion::model()->findByPk($convenioser->id_convenio_institucion);
        $lista_servicio=ConvenioServicios::model()->findAll("id_convenio_institucion='{$convenioser->id_convenio_institucion}'");
        $this->renderPartial('listarConvenioServicio',array(
            'convenio'=>$convenio_insti,
            'listaconvenioservicio'=>$lista_servicio,
        ));
    }
    public function validar($vector=array()){
        $flag=true;
        foreach($vector as $item){
            $flag=$flag && $item->validate();
        }
        return $flag;
    }
    public function actionChangeStateConvenio($id)
    {
        $modelQ= ConvenioServicios::model()->findByPk($id);
        $modelQ->estado=!$modelQ->estado;
        $modelQ->save();
    }
    public function actionSegurospacientesIndex($id){
        $segurocon=new SeguroConvenio;
        $tipo_paciente='TITULAR';
        $paciente=Paciente::model()->findByPk($id);
        $seguroconvenio=SeguroConvenio::model()->findAll(array(
            'condition'=>"estado!=false and tipo_asegurado='{$tipo_paciente}' and id_paciente!='{$id}'",
        ));
        $listaadquiridos=SeguroConvenio::model()->findAll(array(
            'condition'=>"id_paciente= '{$id}'",
        ));
        $this->render('form_seguros_paciente',array(
            'seguro'=>$segurocon,
            'paciente'=>$paciente,
            'listapacientesasegurados'=>$seguroconvenio,
            'listaadquiridos'=>$listaadquiridos,
        ));
    }
    public function actionchangeTipoPaciente(){
        $tipo=$_POST['texto'];

        $paciente=Paciente::model()->findByPk($_POST['paciente']);
        $seguro=new SeguroConvenio;
        $listaseguros=CHtml::listData(ConvenioInstitucion::model()->findAll("id_convenio not in (select id_convenio_institucion from seguro_convenio where id_paciente={$paciente->id_paciente})"),'id_convenio','nombre_convenio');

        $this->renderPartial('tiposeguro',array(
            'tipo_paciente'=>$tipo,
            'seguro'=>$seguro,
            'listaseguros'=>$listaseguros,

        ));
    }
    public function actionCrearSeguroPaciente(){
        $seguro=new SeguroConvenio;
        $seguroconvenio=SeguroConvenio::model()->findAll();
        if(isset($_POST['SeguroConvenio'])){
            $seguro->attributes=array_map('strtoupper',$_POST['SeguroConvenio']);
            $seguro->save();
        }
        $listaadquiridos=SeguroConvenio::model()->findAll(array(
            'condition'=>"id_paciente= '{$seguro->id_paciente}'",
        ));
        $this->redirect(array('/ConvenioInstitucion/SegurospacientesIndex','id'=>$seguro->id_paciente));
    }
    public function actionChangeStateAsegurado($id){
        $seguroconvenio= SeguroConvenio::model()->findByPk($id);
        $seguroconvenio->estado=!$seguroconvenio->estado;
        $seguroconvenio->save();
        $tipo_paciente='TITULAR';
        $listapacientesasegurados=SeguroConvenio::model()->findAll(array(
            'condition'=>"estado!=false and tipo_asegurado='{$tipo_paciente}' and id_paciente!='{$id}'",
        ));
        $this->renderPartial('listapacienteAsegurados',array('listapacientesasegurados'=>$listapacientesasegurados));
        return;
    }
}