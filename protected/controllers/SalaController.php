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
				'actions'=>array('create','update','createTipoSalaAjax','updateTipoSalaAjax','listSalasAjax','changeStateSalaAjax'),
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
        $modelTipoSala->attributes=$_POST['TipoSala'];
        $modelPrecio->attributes=$_POST['PrecioServicio'];
        $modelServicio->attributes=$_POST['Servicio'];
        $val=$this->validar(array($modelServicio,$modelTipoSala,$modelPrecio));
        if($val){
            $modelServicio->save(false);
            $modelTipoSala->id_tipo_sala=$modelServicio->id_servicio; $modelTipoSala->save(false);
            $modelPrecio->id_servicio=$modelServicio->id_servicio; $modelPrecio->save(false);
            $listaTipoSala= new CActiveDataProvider('TipoSala',array('pagination'=>false,'criteria'=>array('order'=>'id_tipo_sala DESC')));
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
                $listaTipoSala= new CActiveDataProvider('TipoSala',array('pagination'=>false,'criteria'=>array('order'=>'id_tipo_sala DESC')));
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
        $listaTipoSala= new CActiveDataProvider('TipoSala',array('pagination'=>false,'criteria'=>array('order'=>'id_tipo_sala DESC')));
        return $this->renderPartial('_rowTipoSala',array('listaTipoSala'=>$listaTipoSala));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $listaTipoSala= new CActiveDataProvider('TipoSala',array('pagination'=>false,'criteria'=>array('order'=>'id_tipo_sala DESC')));
        $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = 0","order"=>"id_tipo_sala DESC"));
        //$listaSala=new CActiveDataProvider('Sala',array('pagination'=>false,'criteria'=>array('order'=>'id_sala DESC','condition'=>'id_tipo_sala =0')));
		$this->render('index',array('listaTipoSala'=>$listaTipoSala,'listaSala'=>$listaSala));


	}

    public function actionListSalasAjax($id=0){
        $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = $id","order"=>"estado_sala ASC,numero_sala DESC"));

        $this->renderPartial('_tableSala',array('listaSala'=>$listaSala));
    }

    public function actionCreateSala(){
        $itemSala=new Sala;
        $itemSala->id_tipo_sala=$this->_tipoSala->id_tipo_sala;

        if(isset($_POST['Sala'])){
            $itemSala->attributes=$_POST['Sala'];
            if($itemSala->save())
                $this->redirect(array('view','id'=>$itemSala->id_tipo_sala));
        }
        $this->render('createSala',array(
            'itemSala'=>$itemSala,
        ));
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

    public function actionChangeStateSalaAjax($id=0,$state=1){
        $modelSala=Sala::model()->findByPk($id);
        $id_tipo=0;
        if($modelSala!=null){
            $modelSala->estado_sala=$state;
            $modelSala->save();
            $id_tipo=$modelSala->id_tipo_sala;
        }
        $listaSala=Sala::model()->findAll(array('condition'=>"id_tipo_sala = $id_tipo","order"=>"estado_sala ASC,numero_sala DESC"));
        $this->renderPartial('_tableSala',array('listaSala'=>$listaSala));
    }


    public function validar($vector=array()){
        $flag=true;
        foreach($vector as $item){
            $flag=$flag && $item->validate();
        }
        return $flag;
    }
}
