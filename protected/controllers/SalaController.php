<?php

class SalaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    private $_tipoSala=null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            'tipoSalaContext + createSala',
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
				'actions'=>array('create','update','createTipoSalaAjax','updateTipoSalaAjax','listSalasAjax','changeStateSalaAjax','renderFormSalaAjax','createSalaAjax','updateSalaAjax','viewSalaAjax','changeStateTipoSalaAjax'),
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

    public function actionIndex()
    {
        $listaTipoSala= TipoSala::model()->findAll();
        $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = 0","order"=>"id_tipo_sala DESC"));
        //$listaSala=new CActiveDataProvider('Sala',array('pagination'=>false,'criteria'=>array('order'=>'id_sala DESC','condition'=>'id_tipo_sala =0')));
        $this->render('index',array('listaTipoSala'=>$listaTipoSala,'listaSala'=>$listaSala));


    }

    public function actionCreate($id=0)
	{
		$modelTipoSala=new TipoSala;
        $modelPrecio= new PrecioServicio;
        $modelServicio= new Servicio;

        if($id!=0){
            $modelTipoSala=TipoSala::model()->findByPk($id);
            $modelServicio=$modelTipoSala->servicio;
            $modelPrecio=$modelServicio->precioServicio;
            if($modelPrecio==null)
                $modelPrecio=new PrecioServicio;
        }

		$this->renderPartial('create',array(
            'modelServicio'=>$modelServicio,
			'modelTipoSala'=>$modelTipoSala,
            'modelPrecio'=>$modelPrecio
		));
	}

    public function actionCreateTipoSalaAjax(){
        $modelTipoSala=new TipoSala;
        $modelPrecio= new PrecioServicio;
        $modelServicio= new Servicio;
        $modelTipoSala->attributes=array_map('strtoupper',$_POST['TipoSala']);
        $modelPrecio->attributes=array_map('strtoupper',$_POST['PrecioServicio']);
        $modelServicio->attributes=array_map('strtoupper',$_POST['Servicio']);
        $val=$this->validar(array($modelServicio,$modelTipoSala,$modelPrecio));
        if($val){
            $modelServicio->save(false);
            $modelTipoSala->id_tipo_sala=$modelServicio->id_servicio; $modelTipoSala->save(false);
            $modelPrecio->id_servicio=$modelServicio->id_servicio; $modelPrecio->save(false);
            $listaTipoSala= TipoSala::model()->findAll();
            $this->renderPartial('_rowTipoSala',array('listaTipoSala'=>$listaTipoSala));
            return ;
        }

        $this->renderPartial('create',array(
            'modelServicio'=>$modelServicio,
            'modelTipoSala'=>$modelTipoSala,
            'modelPrecio'=>$modelPrecio
        ));
    }

	public function actionUpdateTipoSalaAjax()
	{
        if(isset($_POST['Servicio'],$_POST['TipoSala'],$_POST['PrecioServicio'])){
            $modelServicio=Servicio::model()->findByPk($_POST['Servicio']['id_servicio']);
            $modelServicio->attributes=$_POST['Servicio'];
            $modelTipoSala=$modelServicio->tipoSala;
            $modelTipoSala->attributes=$_POST['TipoSala'];
            $modelPrecio= $modelServicio->precioServicio;
            if($modelPrecio==null){
                $modelPrecio=new PrecioServicio;
                $modelPrecio->id_servicio=$modelServicio->id_servicio;
            }
            $modelPrecio->attributes=$_POST['PrecioServicio'];
            $val=$this->validar(array($modelServicio,$modelTipoSala,$modelPrecio));
            if($val){
                $modelServicio->save(false);
                $modelTipoSala->save(false);
                $modelPrecio->save(false);
                $listaTipoSala= TipoSala::model()->findAll();
                return $this->renderPartial('_rowTipoSala',array('listaTipoSala'=>$listaTipoSala));
            }

            return $this->renderPartial('create',array(
                'modelServicio'=>$modelServicio,
                'modelTipoSala'=>$modelTipoSala,
                'modelPrecio'=>$modelPrecio
            ));
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
	}

	public function actionDelete($id)
	{
        $modelServicio=Servicio::model()->findByPk($id);
        if($modelServicio->tipoSala->salas==null){
            $modelServicio->tipoSala->delete();
            PrecioServicio::model()->deleteAll("id_servicio = {$modelServicio->id_servicio}");
            $modelServicio->delete();
        }
        $listaTipoSala= TipoSala::model()->findAll();
        return $this->renderPartial('_rowTipoSala',array('listaTipoSala'=>$listaTipoSala));
	}

	/**
	 * Lists all models.
	 */


    public function actionListSalasAjax($id=0){
        $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = $id","order"=>"estado_sala ASC,numero_sala DESC"));
        $this->renderPartial('_tableSala',array('listaSala'=>$listaSala,'id_tipo_sala'=>$id));
    }

    public function actionChangeStateSalaAjax($id=0,$state=1){
        $modelSala=Sala::model()->findByPk($id);
        $id_tipo=0;
        if($modelSala!=null){
            $modelSala->estado_sala=$state;
            $modelSala->save();
            $id_tipo=$modelSala->id_tipo_sala;
        }
        $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = $id_tipo","order"=>"estado_sala ASC,numero_sala DESC"));
        $this->renderPartial('_tableSala',array('listaSala'=>$listaSala,'id_tipo_sala'=>$id_tipo));
    }

    public function actionRenderFormSalaAjax($id_tipo_sala=0,$id_sala=0){
        $modelSala= new Sala();
        $modelSala->id_tipo_sala=$id_tipo_sala;
        if($id_sala!=0)
            $modelSala=Sala::model()->findByPk($id_sala);
        $this->renderPartial('createSala',array('modelSala'=>$modelSala));
    }

    public function actionCreateSalaAjax(){
        $modelSala=new Sala;
        echo "estamos en create";
        if(isset($_POST['Sala'])){
            echo "has posteado";
            $modelSala->attributes=$_POST['Sala'];
            if($modelSala->validate()){
                $modelSala->save(false);
                $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = {$modelSala->id_tipo_sala}","order"=>"estado_sala ASC,numero_sala DESC"));
                return $this->renderPartial('_tableSala',array('listaSala'=>$listaSala,'id_tipo_sala'=>$modelSala->id_tipo_sala));
            }
        }
        return $this->renderPartial('createSala',array('modelSala'=>$modelSala));
    }

    public function actionUpdateSalaAjax(){
        $modelSala= new Sala();
        if(isset($_POST['Sala'])){
            $modelSala=Sala::model()->findByPk($_POST['Sala']['id_sala']);
            $modelSala->attributes=$_POST['Sala'];
            if($modelSala->validate()){
                $modelSala->save(false);
                $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = {$modelSala->id_tipo_sala}","order"=>"estado_sala ASC,numero_sala DESC"));
                return $this->renderPartial('_tableSala',array('listaSala'=>$listaSala,'id_tipo_sala'=>$modelSala->id_tipo_sala));
            }
        }
        return $this->renderPartial('createSala',array('modelSala'=>$modelSala));
    }

    public function actionViewSalaAjax($id=0){
        $modelTipoSala=TipoSala::model()->findByPk($id);
        if($id==0)
            $modelTipoSala=TipoSala::model()->find();

        $listaSalas=Sala::model()->findAll(['condition'=>"id_tipo_sala ={$modelTipoSala->id_tipo_sala} and estado_sala <> 4",'order'=>'numero_sala ASC']);
        $this->renderPartial('viewSala',['modelTipoSala'=>$modelTipoSala,'listaSalas'=>$listaSalas]);
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='tipo-sala-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function filterTipoSalaContext($filterChain){
        $tiposalaid=null;
        if(isset($_GET['tsid']))
            $tiposalaid=$_GET['tsid'];
        else{
            if(isset($_POST['tsid']))
                $tiposalaid=$_POST['tsid'];
        }
        $this->loadTipoSala($tiposalaid);
        $filterChain->run();
    }

    public function loadTipoSala($tsid){
        if($this->_tipoSala==null){
            $this->_tipoSala=TipoSala::model()->findByPk($tsid);
            if($this->_tipoSala==null){
                throw new CHttpException(404,'El tipo de sala que has seleccionado no es valido');
            }
        }
        return $this->_tipoSala;
    }

    public function actionChangeStateTipoSalaAjax($id_tipo=0,$estado=0){
        $modelServicio=Servicio::model()->findByPk($id_tipo);
        if($modelServicio!=null){
            $modelServicio->estado_serv=$estado;
            $modelServicio->save();
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
