<?php

class HorarioController extends Controller
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
				'actions'=>array('index','view','detalleHorario','CrearHorario','ViewDetailHorario','ActualizarHorario','CrearTurno','create','update','cambiaEstado','admin','delete','indexturno'),
				'roles'=>array('ADMINISTRAR_HORARIOS','ADMIN'),
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
        $turnos=new CActiveDataProvider('Turno',array(
            'criteria'=>array(
                'condition'=>"id_horario={$id}",
                'order'=>'id_horario DESC',
            ),
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'turnos'=>$turnos,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Horario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Horario']))
		{
            $model->attributes=array_map('strtoupper', $_POST['Horario']);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_horario));
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

		if(isset($_POST['Horario']))
		{
			$model->attributes=array_map('strtoupper', $_POST['Horario']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_horario));
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

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Horario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Horario']))
			$model->attributes=$_GET['Horario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Horario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Horario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Horario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='horario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /*public function actionCambiaEstado($id){
        $model=Horario::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        else{
            if($model->estado=="ACTIVO")
                $model->estado="INACTIVO";
            else
                $model->estado="ACTIVO";
            $model->save();
        }
        $this->redirect(array("index"));
    }*/
    public function actionIndex($id=0)
    {
        $horario=new Horario;
        $listahorarios=Horario::model()->findAll();
        $this->render('index',array('horario'=>$horario,'listahorarios'=>$listahorarios,'id_h'=>$id));
    }
    public function actionCrearHorario(){
        $horario=new Horario;
        if(isset($_POST['Horario'])){
            $horario->attributes=array_map('strtoupper',$_POST['Horario']);
            if($horario->save()){
                $this->redirect(array('/horario/index'));
            }
			$listahorarios=Horario::model()->findAll();
			$this->render('index',array('horario'=>$horario,'listahorarios'=>$listahorarios));
        }
    }

    public function actionActualizarHorario($id){
        $horario=Horario::model()->findByPk($id);
        $turno=new Turno;
        if(isset($_POST['Horario'])){
            $horario->attributes=array_map('strtoupper',$_POST['Horario']);
            if($horario->save()){
                $this->redirect(array('/horario/index'));
            }
        }
        $listahorarios=Horario::model()->findAll();
        $this->render('index',array('horario'=>$horario,'listahorarios'=>$listahorarios,'turno',$turno));
    }

	public function actionViewDetailHorario($id_h=0){
		$horario= Horario::model()->findByPk($id_h);
		$this->renderPartial('_itemTurno',['modelHorario'=>$horario]);
	}

    public function actionIndexTurno(){
        $turno= new Turno();
        $listaTurno=Turno::model()->findAll();
        $this->render('/turno/index',array('turno'=>$turno,'listaTurno'=>$listaTurno));
    }

    public function actionCrearTurno(){
        $turno=new Turno;
        if(isset($_POST['Turno'])){
            $turno->attributes=array_map('strtoupper',$_POST['Turno']);
            if($turno->save()){
                $this->redirect(array('/Horario/indexTurno'));
            }else{
                $listaTurno=Turno::model()->findAll();
                $this->render('/turno/index',array('turno'=>$turno,'listaTurno'=>$listaTurno));
            }
            return;
        }
        $listaTurno=Turno::model()->findAll();
        $this->render('/turno/index',array('turno'=>$turno,'listaTurno'=>$listaTurno));
    }

	public function actionDetalleHorario($id_h=0){
		$modelHorario=Horario::model()->findByPk($id_h);
		if(isset($_POST['HorarioTurno'])){
			foreach($modelHorario->horarioTurno as $item)
				$item->delete();
			foreach($_POST['HorarioTurno'] as $item){
				$model= new HorarioTurno();
				$model->attributes=$item;$model->id_horario=$modelHorario->id_horario;
				$model->save();
			}
			$this->redirect(array('/Horario/index','id'=>$modelHorario->id_horario));
		}
		return $this->render('detalleHorario',['modelHorario'=>$modelHorario]);
	}


}
