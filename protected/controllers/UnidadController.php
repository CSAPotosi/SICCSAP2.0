<?php

class UnidadController extends Controller
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
				'actions'=>array('index','view','enabled','VerCargosUnidad','formCrearCargo','ChangeStateCargo','ActualizarCargo','NuevaUnidad'),
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
	public function actionCreate()
	{
		$unidad=new Unidad;
        if(isset($_POST['Unidad'])){
            $unidad->attributes=array_map('strtoupper',$_POST['Unidad']);
            if($unidad->save()){
                $this->redirect(array("/Unidad/index/"));
            }
            $listaunidad=Unidad::model()->findAll();
            $cargo=new Cargo;
            $this->render('create',array(
                'cargo'=>$cargo,
                'unidad'=>$unidad,
                'listaunidad'=>$listaunidad,
            ));
        }
	}
	public function actionUpdate($id)
	{
		$unidad=Unidad::model()->findByPk($id);
        if(isset($_POST['Unidad'])){
            $unidad->attributes=array_map('strtoupper',$_POST['Unidad']);
            if($unidad->save()){
                $this->redirect(array('/Unidad/index/'));
            }
        }
        $cargo=new Cargo;
        $listaunidad=Unidad::model()->findAll();
        $this->render('create',array(
            'cargo'=>$cargo,
            'unidad'=>$unidad,
            'listaunidad'=>$listaunidad,
        ));
	}
	public function actionIndex()
	{
         $unidad=new Unidad;
         $listaunidad=Unidad::model()->findAll();
         $cargo=new Cargo;
         $this->render('create',array(
             'unidad'=>$unidad,
             'listaunidad'=>$listaunidad,
             'cargo'=>$cargo,
         ));
    }
    public function actionVerCargosUnidad($id){
        $unidad=Unidad::model()->findByPk($id);
        $listacargos=Cargo::model()->findAll(array(
            'condition'=>"id_unidad = '{$id}'",
        ));
        $this->renderPartial('listacargounidad',array('unidad'=>$unidad,'listacargos'=>$listacargos));
    }
    public function actionformCrearCargo(){
        $cargo=new Cargo;
        if(isset($_POST['Cargo'])){
            $cargo->attributes=array_map('strtoupper',$_POST['Cargo']);
            if($cargo->save()){
                $listacargos=Cargo::model()->findAll(array(
                    'condition'=>"id_unidad='{$cargo->id_unidad}'"
                ));
                $unidad=Unidad::model()->findByPk($cargo->id_unidad);
                $this->renderPartial('listacargounidad',array('listacargos'=>$listacargos,'unidad'=>$unidad));
                return;
            }
        $this->renderPartial('form_cargo',array('cargo'=>$cargo));
        return;
        }

    }
    public function actionChangeStateCargo($id){
        $cargo= Cargo::model()->findByPk($id);
        $cargo->estado=!$cargo->estado;
        $cargo->save();
    }
    public function actionActualizarCargo($id=0){
        if($id==0){
            $cargo=Cargo::model()->findByPk($_POST['Cargo']['id_cargo']);
            if(isset($_POST['Cargo'])){
                $cargo->attributes=array_map('strtoupper',$_POST['Cargo']);
                if($cargo->save()){
                    $listacargos=Cargo::model()->findAll(array(
                        'condition'=>"id_unidad='{$cargo->id_unidad}'"
                    ));
                    $unidad=Unidad::model()->findByPk($cargo->id_unidad);
                    $this->renderPartial('listacargounidad',array('listacargos'=>$listacargos,'unidad'=>$unidad));
                    return;
                }
                $this->renderPartial('form_cargo',array('cargo'=>$cargo));
                return;
            }
        }
        else{
            $cargo=Cargo::model()->findByPk($id);
            $this->renderPartial('form_cargo',array('cargo'=>$cargo));
            return;
        }
    }
    public function actionNuevaUnidad(){
        $this->renderPartial('_form',array('unidad'=>new Unidad));
        return;
    }

}
