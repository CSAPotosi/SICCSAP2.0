<?php

class ServicioController extends Controller
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
				'actions'=>array('index','view','Crearlab','Categorialab','CrearcategorialabAjax','Updatecatlab','UpdatecategoriaAjax','DeletecategoriaAjax','Deletecatlab','Itemcatlab','CreateItemlabAjax','Nuevoitemlab','Nuevocatlab','Updateitemcatlab','Upditemlabc','Detalleitemcatlab','Deleteitemcatlab','BuscarItemlabAjax'),
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
		$model=new Servicio;
        $precio=new PrecioServicio;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Servicio']))
		{
			$model->attributes=array_map('strtoupper',$_POST['Servicio']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_servicio));
		}

		$this->render('create',array(
			'model'=>$model,
            'precio'=>$precio,
		));
	}
    public function actionCrearlab(){
        $model=new Servicio;
        $precio=new PrecioServicio;
        $cat_lab=new CategoriaExLaboratorio;
        $listcalab=CategoriaExLaboratorio::model()->FindAll(array('order'=>'id_cat_lab ASC'));
        $this->render('_form_lab',array(
            'model'=>$model,
            'precio'=>$precio,
            'cat_lab'=>$cat_lab,
            'listcalab'=>$listcalab,
        ));
    }
    public function actionCrearcategorialabAjax(){
        $cat_lab=new CategoriaExLaboratorio;
        if(isset($_POST['CategoriaExLaboratorio'])){
            $cat_lab->attributes=array_map('strtoupper',$_POST['CategoriaExLaboratorio']);
            if($cat_lab->save()){
                $listcalab=CategoriaExLaboratorio::model()->findAll(array('order'=>'id_cat_lab ASC'));
                $this->renderPartial('_form_cat_lab_row',array('listcalab'=>$listcalab));
                return;
            }
            $this->renderPartial('_form_cat_lab',array('cat_lab'=>$cat_lab));
        }
        else
        $this->renderPartial('_form_cat_lab',array('cat_lab'=>$cat_lab));
    }
    public function actionUpdatecatlab($id){
        $cat_lab=CategoriaExLaboratorio::model()->findByPk($id);
        $this->renderPartial('_form_cat_lab',array('cat_lab'=>$cat_lab));
        return;
    }
    public function actiondeletecatlab($id){
        $cat_lab=CategoriaExLaboratorio::model()->findByPk($id);
        $cat_lab->delete();
        $listcalab=CategoriaExLaboratorio::model()->findAll(array('order'=>'id_cat_lab ASC'));
        $this->renderPartial('_form_cat_lab_row',array('listcalab'=>$listcalab));
        return;
    }
    public function actionUpdatecategoriaAjax(){
        if(isset($_POST['CategoriaExLaboratorio'])){
            $cat_lab=CategoriaExLaboratorio::model()->findByPk($_POST['CategoriaExLaboratorio']['id_cat_lab']);
            $cat_lab->attributes=$_POST['CategoriaExLaboratorio'];
            if($cat_lab->save()){
                $listcalab=CategoriaExLaboratorio::model()->findAll(array('order'=>'id_cat_lab ASC'));
                $this->renderPartial('_form_cat_lab_row',array('listcalab'=>$listcalab));
                return;
            }
            $this->renderPartial('_form_cat_lab',array('cat_lab'=>$cat_lab));
        }
    }
    public function actionItemcatlab($id){
        $cat_lab_item=CategoriaExLaboratorio::model()->findByPk($id);
        if($cat_lab_item->examenLaboratorios!=null){
            $listaitem=ExamenLaboratorio::model()->findAll();
            $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listaitem,'cat_btn_item'=>$cat_lab_item->id_cat_lab));
        }
        else{
            $this->renderPartial('_form_vacio_cat_item',array('cat_bnt_item'=>$cat_lab_item->id_cat_lab));
        }
    }
    public function actionCreateItemlabAjax(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $exlab=new ExamenLaboratorio;
        $servicio->attributes=$_POST['Servicio'];
        $precio->attributes=$_POST['PrecioServicio'];

        $val=$this->validar(array($servicio,$precio));
        if($val){
            $servicio->save(false);
            $precio->id_servicio=$servicio->id_servicio;
            $precio->save(false);
            $exlab->id_servicio=$servicio->id_servicio;
            $exlab->id_cat_lab=$_POST['ExamenLaboratorio']['id_cat_lab'];
            $exlab->save(false);
            $listaitem=ExamenLaboratorio::model()->findAll(array('order'=>'id_servicio ASC'));
            $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listaitem,'cat_btn_item'=>$exlab->id_cat_lab));
            return;
        }
        $this->renderPartial('_form_cat_lab_item',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionNuevoitemlab(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $this->renderPartial('_form_cat_lab_item',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionNuevocatlab(){
        $listcalab=CategoriaExLaboratorio::model()->findAll(array('order'=>'id_cat_lab ASC'));
        $this->renderPartial('_form_cat_lab_row',array('listcalab'=>$listcalab));
    }
    public function actionUpdateitemcatlab($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $this->renderPartial('_form_cat_lab_item',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionUpditemlabc(){
            if(isset($_POST['Servicio'],$_POST['PrecioServicio'])){
            $servicio=Servicio::model()->findByPk($_POST['Servicio']['id_servicio']);
            $servicio->attributes=$_POST['Servicio'];
            $precio=$servicio->precioServicio;
            $precio->attributes=$_POST['PrecioServicio'];
            $val=$this->validar(array($servicio,$precio));
            if($val){
                $servicio->save(false);
                $precio->id_servicio=$servicio->id_servicio;
                $precio->save(false);
                $exlab=$servicio->examenLaboratorio;
                $listaitem=ExamenLaboratorio::model()->findAll(array('order'=>'id_servicio ASC'));
                $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listaitem,'cat_btn_item'=>$exlab->id_cat_lab));
                return;
            }
            }
        $this->renderPartial('_form_cat_lab_item',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionDetalleitemcatlab($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $this->renderPartial('_form_detalle_items',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionDeleteitemcatlab($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $exlab=$servicio->examenLaboratorio;
        $cat_btn_item=$servicio->examenLaboratorio->id_cat_lab;
        $precio->delete();
        $exlab->delete();
        $servicio->delete();
        $listitemlab=ExamenLaboratorio::model()->findAll();
        $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listitemlab,'cat_btn_item'=>$cat_btn_item));
    }
    public function actionBuscarItemlabAjax(){
        $nombre= $_POST['cadena'];
        $catitem= $_POST['catitem'];
        $listaitemcat=Servicio::model()->findAll(array(
            'condition'=>"nombre_serv like '%{$nombre}%'",

        ));
        foreach($listaitemcat as $list):
            $listitemlab[]=$list->examenLaboratorio;
        endforeach;
        $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listitemlab,'cat_btn_item'=>$catitem));
    }
	public function loadModel($id)
	{
		$model=Servicio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Servicio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categorialab-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function validar($vector=array()){
        $flag=true;
        foreach($vector as $item){
            $flag=$flag && $item->validate();
        }
        return $flag;
    }
}
