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
            array('allow',
                'actions'=>array('_form_Updateper','CrearEmpleado','Updateempleado','Updempleadoper','Medicos','Empleado','CrearMedico','MedicoInformacion','view','index','buscarPersonaAjax','admin','delete'),
                'roles'=>array('ADMINISTRAR_EMPLEADO','ADMIN'),
            ),
            array('allow',
                'actions'=>array('Crearcontacto','Crearpaciente','_form_updatepa','_form_Updateper','Nc','view','index','create','update','updatepa','buscarContactoAjax','buscarPersonaAjax'),
                'roles'=>array('ADMINISTRAR_PACIENTE','ADMIN'),
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
            if($Percontacto->save()){
                $this->renderPartial('_form_contacto',array('contacto'=>$Percontacto,'valorcontacto'=>"1",'id_persona_contacto'=>$Percontacto->id,'nombre_completo'=>$Percontacto->getNombreCompleto()));
                return;
            }
        }
        $this->renderPartial('_form_contacto',array('contacto'=>$Percontacto,'valorcontacto'=>"0",'id_persona_contacto'=>"",'nombre_completo'=>""));
    }
    public function actionNc(){
        $contacto=new Persona;
        $this->renderPartial('_form_contacto',array('contacto'=>$contacto,'valorcontacto'=>"0"));
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
                   $this->redirect(array('update','id'=>$model->id));
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
                $this->redirect(array('view','id'=>$paciente->id_paciente));
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
                    $this->redirect(array('view','id'=>$model->id));
            }
        }
        $this->render('_form_updateper',array(
            'model'=>$model,
        ));
    }
    public function actionMedicos(){
        $listaPersonas=Persona::model()->findAll(array(
            'order'=>'id DESC',
        ));
        $this->render('indexmedicos',array(
            'listaPersonas'=>$listaPersonas,'tipo_persona'=>'medico',
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
            'order'=>'id DESC',
        ));
		$this->render('index',array(
            'listaPersonas'=>$listaPersonas,'tipo_persona'=>'paciente',
		));
	}
    public function actionEmpleado(){
        $listaPersonas=Persona::model()->findAll(array(
            'order'=>'id DESC',
        ));
        $this->render('indexEmpleado',array(
            'listaPersonas'=>$listaPersonas,'tipo_persona'=>'empleado',
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
            'condition'=>"codigo like '%{$codigo}%' or dni like '%{$codigo}%' or concat_ws(' ',primer_apellido,segundo_apellido,nombres) like '%{$codigo}%'",
            'order'=>'id DESC'
        ));
        if($listaPersonas==null){
            echo 'No se han encontrado resultados';
        }
        return $this->renderPartial('_listaPersonas',array(
            'listaPersonas'=>$listaPersonas,'tipo_persona'=>'paciente'
        ));
    }
    public function actionBuscarContactoAjax(){
        $nombres= $_POST['cadena'];
        $listaContactos=Persona::model()->findAll(array(
           'condition'=>"nombres like '%{$nombres}%'",
            'order'=>'id DESC',
        ));
        if($listaContactos==null){
            echo 'No se han encontrado resultados';
        }
        return $this->renderPartial('_listaContactos',array('listaContactos'=>$listaContactos));
    }

    public function actionCrearEmpleado(){
        $model=new Persona;
        if(isset($_POST['Persona']))
        {
            $filename="no-photo.png";
            if (!empty($_POST['Persona']['fotografia']))
            {
                $foto = $_POST['Persona']['fotografia'];
                $foto = str_replace('data:image/png;base64,', '', $foto);
                $foto = str_replace(' ', '+', $foto);
                $data_foto = base64_decode($foto);
                $filename = $_POST['Persona']['dni'].'.png';
                $filepath = YiiBase::getPathOfAlias("webroot").'/fotografias/'.$filename;
            }
            $model->attributes=array_map('strtoupper',$_POST['Persona']);
            $model->fotografia=$filename;
            if($model->save())

                $this->redirect(array('updateempleado','id'=>$model->id));

        }
        $this->render('personaempleado',array(
            'model'=>$model,
        ));
    }
    public function actionUpdateempleado($id=0)
    {
        $empleado=new empleado;
        if($id!=0){
        $model=$this->loadModel($id);
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
                if($model->empleado!=null){
                    $this->redirect(array('Updempleadoper','id'=>$model->id));
                }
                else{
                    $this->redirect(array('updateempleado','id'=>$model->id));
                }
            }
        }
            $this->render('_index_empleado',array(
                'model'=>$model,
                'empleado'=>$empleado,
            ));
        }
        else{
        if(isset($_POST['Empleado']))
        {
            $empleado->attributes=array_map('strtoupper',$_POST['Empleado']);
            if($empleado->save()){
                $this->redirect(array('index'));
            }
        }
        }

    }
    public function actionUpdempleadoper($id){
        $model=$this->loadModel($id);
        $empleado=Empleado::model()->findByPk($id);
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
                    $this->redirect(array('Updempleadoper','id'=>$model->id));
            }
        }
        if(isset($_POST['Empleado']))
        {
            $empleado->attributes=array_map('strtoupper',$_POST['Empleado']);
            if($empleado->save()){
                $this->redirect(array('view','id'=>$model->id));
            }
        }
        $this->render('_form_empleadoper',array(
            'model'=>$model,
            'empleado'=>$empleado,
        ));
    }
    public function actionCrearMedico(){
        $model=new Persona;
        if(isset($_POST['Persona']))
        {
            $filename="no-photo.png";
            if (!empty($_POST['Persona']['fotografia']))
            {
                $foto = $_POST['Persona']['fotografia'];
                $foto = str_replace('data:image/png;base64,', '', $foto);
                $foto = str_replace(' ', '+', $foto);
                $data_foto = base64_decode($foto);
                $filename = $_POST['Persona']['dni'].'.png';
                $filepath = YiiBase::getPathOfAlias("webroot").'/fotografias/'.$filename;
            }
            $model->attributes=array_map('strtoupper',$_POST['Persona']);
            $model->fotografia=$filename;
            if($model->save())
                $this->redirect(array('MedicoInformacion','id'=>$model->id));
        }
        $this->render('datosmedico',array(
            'model'=>$model,
        ));
    }
    public function actionMedicoInformacion($id){
        $medico=new Medico;
        $medico_especialidad=new MedicoEspecialidad;
        $listaespecialidades=Especialidad::model()->findAll();
        $this->render('infoMedico',array(
            'medico_especialidad'=>$medico_especialidad,
            'medico'=>$medico,
            'id'=>$id,
            'listaespecialidades'=>$listaespecialidades
        ));
    }
}
