<?php

class MedicoController extends Controller
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
				'actions'=>array('index','view','CrearEspecialidad','ActualizarEs'),
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
    public function actionCreate()
    {
        $modelM=new Medico;
        $items=$this->getItems();
        $modelE=new Especialidad();
        //$modelME= new MedicoEspecialidad;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Medico']))
        {

            $modelM->attributes=$_POST['Medico'];
            if($modelM->save()){
                foreach($items as $i=>$item)
                {
                    if(isset($_POST['MedicoEspecialidad'][$i])){
                        $item->attributes=$_POST['MedicoEspecialidad'][$i];
                        $item->id_medico=$modelM->id;

                        $item->save();

                    }
                }
                $this->redirect(array('view','id'=>$modelM->id));
            }
        }

        $this->render('create',array(
            'modelM'=>$modelM,
            'items'=>$items,
            'modelE'=>$modelE,
        ));
    }
    public function actionCrearEspecialidad()
    {
        $especialidad= new Especialidad;
        if(isset($_POST['Especialidad'])){
            $especialidad->attributes=$_POST['Especialidad'];
            if($especialidad->save()){
                $listaespecialidad=Especialidad::model()->findAll();
                $this->renderPartial('_form_especialidad',array('listaespecialidad'=>$listaespecialidad,));return;
            }
        }
        $this->renderPartial('_especialidad_formulario',array('especialidad'=>$especialidad));
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
        $items=$this->getItems();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Medico']))
        {
            $model->attributes=$_POST['Medico'];
            if($model->save()){
                foreach($items as $i=>$item)
                {
                    if(isset($_POST['MedicoEspecialidad'][$i])){
                        $item->attributes=$_POST['MedicoEspecialidad'][$i];
                        $item->id_medico=$id;
                        $item->save();
                    }
                }
                $this->redirect(array('view','id'=>$model->id_medico));
            }
        }
        else{
            $items=MedicoEspecialidad::model()->find('id_medico=:idmedico',array(':idmedico'=>$id));
        }

        $this->render('update',array(
            'modelM'=>$model,
            'items'=>$items,
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
		$dataProvider=new CActiveDataProvider('Medico');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Medico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Medico']))
			$model->attributes=$_GET['Medico'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Medico the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Medico::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Medico $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='medico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
