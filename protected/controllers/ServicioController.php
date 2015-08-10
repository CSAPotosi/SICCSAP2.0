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
				'actions'=>array('index','view','Crearlab','Categorialab','CrearcategorialabAjax','Updatecatlab','UpdatecategoriaAjax','DeletecategoriaAjax','Deletecatlab','Itemcatlab','CreateItemlabAjax','Nuevoitemlab','Nuevocatlab','Updateitemcatlab','Upditemlabc','Detalleitemcatlab','Deleteitemcatlab','BuscarItemlabAjax','Creargab','CreargabineteAjax','Updategab','Deletegab','Itemgab','CrearGabItem','Updateitemcatgab','Deleteitemcatgab','Nuevocatgab','BuscarItemgabAjax','CrearSer','CrearclinicoAjax','Updatecli','Deletecli','Itemcli','CrearCliItem','NueCliRow','Updateitemcatcli','Deleteitemcatcli','BuscarItemcliAjax','CrearEnf','CrearCliItemenf','Updateitemcatenf','Deleteitemcatenf','BuscarItemenfAjax','IndexAtencion','CrearServicioAtencion','RegistrarAtencion','ListarEspecialidad','ActualizarAtencionMedica','EliminarAtencionMedica','create','update','admin','delete'),
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
        $listaitem=ExamenLaboratorio::model()->findAll(array(
            'condition'=>"id_cat_lab ='{$cat_lab_item->id_cat_lab}'",
        ));
        $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listaitem,'cat_btn_item'=>$cat_lab_item->id_cat_lab));
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
            $listaitem=ExamenLaboratorio::model()->findAll(array(
                'condition'=>"id_cat_lab ='{$exlab->id_cat_lab}'",
                'order'=>'id_servicio ASC'));
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
    public function actionNuevocatgab(){
        $listcagab=CategoriaExGabinete::model()->findAll(array('order'=>'id_cat_gab ASC'));
        $this->renderPartial('_form_gabinete_row',array('listgabinete'=>$listcagab));
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
                $listaitem=ExamenLaboratorio::model()->findAll(array(
                    'condition'=>"id_cat_lab ='{$exlab->id_cat_lab}'",
                    'order'=>'id_servicio ASC'));
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
        $listitemlab=ExamenLaboratorio::model()->findAll(array(
            'condition'=>"id_cat_lab ='{$cat_btn_item}'",
        ));
        $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listitemlab,'cat_btn_item'=>$cat_btn_item));
    }
    public function actionBuscarItemlabAjax(){
        $nombre= $_POST['cadena'];
        $catitem= $_POST['catitem'];
        $listaitemcat=Servicio::model()->findAll(array(
            'condition'=>"nombre_serv like '%{$nombre}%'",
        ));
        if($nombre==null){
            $listitemlab=ExamenLaboratorio::model()->findAll(array(
                'condition'=>"id_cat_lab ='{$catitem}'",
            ));
        }
        else{
        $listitemlab=array();
        foreach($listaitemcat as $list):
            if($list->examenLaboratorio->id_cat_lab==$catitem){
               $listitemlab[]=$list->examenLaboratorio;
            }
        endforeach;
        }
        $this->renderPartial('_form_item_cat_lab_row',array('listitemlab'=>$listitemlab,'cat_btn_item'=>$catitem));
    }
    public function actionCreargab(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $gabinete=new CategoriaExGabinete;
        $listgabinete=CategoriaExGabinete::model()->FindAll(array('order'=>'id_cat_gab ASC'));
        $this->render('_form_gab',array(
            'servicio'=>$servicio,
            'precio'=>$precio,
            'gabinete'=>$gabinete,
            'listgabinete'=>$listgabinete,

        ));
    }
    public function actionCreargabineteAjax(){
        $gabinete=new CategoriaExGabinete;
        if(isset($_POST['CategoriaExGabinete'])){
            $gabinete->attributes=$_POST['CategoriaExGabinete'];
            if($gabinete->save()){
                $listgabinete=CategoriaExGabinete::model()->findAll(array('order'=>'id_cat_gab ASC'));
                $this->renderPartial('_form_gabinete_row',array('listgabinete'=>$listgabinete));
                return;
            }
            else{
            $this->renderPartial('_form_gabinete',array('gabinete'=>$gabinete));return;
            }
        }
        $this->renderPartial('_form_gabinete',array('gabinete'=>$gabinete));
    }

    public function actionUpdategab($id=0){
        $gabinete=new CategoriaExGabinete;
        if($id!=0){
            $gabinete=CategoriaExGabinete::model()->findByPk($id);
        }
        else{
            if(isset($_POST['CategoriaExGabinete'])){
                $gabinete=CategoriaExGabinete::model()->findByPk($_POST['CategoriaExGabinete']['id_cat_gab']);
                $gabinete->attributes=$_POST['CategoriaExGabinete'];
                if($gabinete->save()){
                    $listgabinete=CategoriaExGabinete::model()->findAll(array('order'=>'id_cat_gab ASC'));
                    $this->renderPartial('_form_gabinete_row',array('listgabinete'=>$listgabinete));
                    return;
                }
            }
        }
        $this->renderPartial('_form_gabinete',array('gabinete'=>$gabinete));
    }
    public function actionDeletegab($id){
        $gabinete=CategoriaExGabinete::model()->findByPk($id);
        $gabinete->delete();
        $listgabinete=CategoriaExGabinete::model()->findAll(array('order'=>'id_cat_gab ASC'));
        $this->renderPartial('_form_gabinete_row',array('listgabinete'=>$listgabinete));
    }
    public function actionItemgab($id){
        $cat_gab_item=CategoriaExGabinete::model()->findByPk($id);
        $listaitem=ExamenGabinete::model()->findAll(array(
            'condition'=>"id_cat_gab ='{$cat_gab_item->id_cat_gab}'",
        ));
        $this->renderPartial('_form_gabinete_ex_row',array('listaitemgab'=>$listaitem,'cat_gab_item'=>$cat_gab_item->id_cat_gab));
    }
    public function actionCrearGabItem(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $exgab=new ExamenGabinete;
        if(isset($_POST['Servicio'],$_POST['PrecioServicio'])){
            $servicio->attributes=$_POST['Servicio'];
            $precio->attributes=$_POST['PrecioServicio'];
            $val=$this->validar(array($servicio,$precio));
            if($val){
                $servicio->save(false);
                $precio->id_servicio=$servicio->id_servicio;
                $precio->save(false);
                $exgab->id_servicio=$servicio->id_servicio;
                $exgab->id_cat_gab=$_POST['ExamenGabinete']['id_cat_gab'];
                $exgab->save(false);
                $listaitem=ExamenGabinete::model()->findAll(array(
                    'condition'=>"id_cat_gab ='{$_POST['ExamenGabinete']['id_cat_gab']}'",
                ));
                $this->renderPartial('_form_gabinete_ex_row',array('listaitemgab'=>$listaitem,'cat_gab_item'=>$_POST['ExamenGabinete']['id_cat_gab']));
                return;
            }
        }
        $this->renderPartial('_form_gabinete_ex',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionUpdateitemcatgab($id=0){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $exgab=new ExamenGabinete;
        if($id!=0){
            $servicio=Servicio::model()->findByPk($id);
            $precio=$servicio->precioServicio;
        }
        else{
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
                   $exlab=$servicio->examenGabinete;
                   $listaitem=ExamenGabinete::model()->findAll(array(
                       'condition'=>"id_cat_gab ='{$servicio->examenGabinete->id_cat_gab}'",
                   ));
                   $this->renderPartial('_form_gabinete_ex_row',array('listaitemgab'=>$listaitem,'cat_gab_item'=>$servicio->examenGabinete->id_cat_gab));
                   return;
               }
            }
        }
        $this->renderPartial('_form_gabinete_ex',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionDeleteitemcatgab($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $exlab=$servicio->examenGabinete;
        $cat_btn_item=$servicio->examenGabinete->id_cat_gab;
        $precio->delete();
        $exlab->delete();
        $servicio->delete();
        $listaitem=ExamenGabinete::model()->findAll(array(
            'condition'=>"id_cat_gab ='{$cat_btn_item}'",
        ));
        $this->renderPartial('_form_gabinete_ex_row',array('listaitemgab'=>$listaitem,'cat_gab_item'=>$cat_btn_item));
    }
    public function actionBuscarItemgabAjax(){
        $nombre= $_POST['cadena'];
        $catitem= $_POST['catitem'];
        $listaitemcat=Servicio::model()->findAll(array(
            'condition'=>"nombre_serv like '%{$nombre}%'",
        ));
        if($nombre==null){
            $listitemgab=ExamenGabinete::model()->findAll(array(
                'condition'=>"id_cat_gab ='{$catitem}'",
            ));
        }
        else{
            $listitemgab=array();
            foreach($listaitemcat as $list):
                if($list->examenGabinete->id_cat_gab==$catitem){
                $listitemgab[]=$list->examenGabinete;
                }
            endforeach;
        }
        $this->renderPartial('_form_gabinete_ex_row',array('listaitemgab'=>$listitemgab,'cat_gab_item'=>$catitem));
    }
    public function actionCrearSer(){
        $listclinico=CategoriaServicioClinico::model()->FindAll(array('order'=>'id_cat_cli ASC'));
        $this->render('_form_ser',array(
            'listclinico'=>$listclinico,
        ));
    }
    public function actionNueCliRow(){
        $listclinico=CategoriaServicioClinico::model()->FindAll(array('order'=>'id_cat_cli ASC'));
        $this->renderPartial('_form_clinico_row',array(
            'listclinico'=>$listclinico,
        ));
    }
    public function actionCrearclinicoAjax(){
        $clinico= new CategoriaServicioClinico;
        if(isset($_POST['CategoriaServicioClinico'])){
            $clinico->attributes=$_POST['CategoriaServicioClinico'];
            if($clinico->save()){
                $listclinico=CategoriaServicioClinico::model()->findAll(array('order'=>'id_cat_cli ASC'));
                $this->renderPartial('_form_clinico_row',array('listclinico'=>$listclinico));
                return;
            }
        }
        $this->renderPartial('_form_clinico',array('clinico'=>$clinico));
    }
    public function actionUpdatecli($id=0){
        $clinico=new CategoriaServicioClinico;
        if($id!=0){
            $clinico=CategoriaServicioClinico::model()->findByPk($id);
        }
        else{
            if(isset($_POST['CategoriaServicioClinico'])){
                $clinico=CategoriaServicioClinico::model()->findByPk($_POST['CategoriaServicioClinico']['id_cat_cli']);
                $clinico->attributes=$_POST['CategoriaServicioClinico'];
                if($clinico->save()){
                    $listclinico=CategoriaServicioClinico::model()->findAll(array('order'=>'id_cat_cli ASC'));
                    $this->renderPartial('_form_clinico_row',array('listclinico'=>$listclinico));
                    return;
                }
            }
        }
        $this->renderPartial('_form_clinico',array('clinico'=>$clinico));
    }
    public function actionDeletecli($id){
        $clinico=CategoriaServicioClinico::model()->findByPk($id);
        $clinico->delete();
        $listclinico=CategoriaServicioClinico::model()->findAll(array('order'=>'id_cat_cli ASC'));
        $this->renderPartial('_form_clinico_row',array('listclinico'=>$listclinico));
    }
    public function actionItemcli($id){
        $cat_cli_item=CategoriaServicioClinico::model()->findByPk($id);
        $listaitem=ServicioClinico::model()->findAll(array(
            'condition'=>"id_cat_cli ='{$cat_cli_item->id_cat_cli}'",
        ));
        $this->renderPartial('_form_clinico_ser_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$cat_cli_item->id_cat_cli));
    }
    public function actionCrearCliItem(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $excli=new ServicioClinico;
        if(isset($_POST['Servicio'],$_POST['PrecioServicio'])){
            $servicio->attributes=$_POST['Servicio'];
            $precio->attributes=$_POST['PrecioServicio'];
            $val=$this->validar(array($servicio,$precio));
            if($val){
                $servicio->save(false);
                $precio->id_servicio=$servicio->id_servicio;
                $precio->save(false);
                $excli->id_servicio=$servicio->id_servicio;
                $excli->id_cat_cli=$_POST['ServicioClinico']['id_cat_cli'];
                $excli->save(false);
                $listaitem=ServicioClinico::model()->findAll(array(
                    'condition'=>"id_cat_cli ='{$_POST['ServicioClinico']['id_cat_cli']}'",
                ));
                $this->renderPartial('_form_clinico_ser_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$_POST['ServicioClinico']['id_cat_cli']));
                return;
            }
        }
        $this->renderPartial('_form_clinico_ser',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionCrearCliItemenf(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $excli=new ServicioClinico;
        if(isset($_POST['Servicio'],$_POST['PrecioServicio'])){
            $servicio->attributes=$_POST['Servicio'];
            $precio->attributes=$_POST['PrecioServicio'];
            $val=$this->validar(array($servicio,$precio));
            if($val){
                $servicio->save(false);
                $precio->id_servicio=$servicio->id_servicio;
                $precio->save(false);
                $excli->id_servicio=$servicio->id_servicio;
                $excli->id_cat_cli=$_POST['ServicioClinico']['id_cat_cli'];
                $excli->save(false);
                $listaitem=ServicioClinico::model()->findAll(array(
                    'condition'=>"id_cat_cli ='{$_POST['ServicioClinico']['id_cat_cli']}'",
                ));
                    $this->renderPartial('_form_enfermeria_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$_POST['ServicioClinico']['id_cat_cli']));
                    return;
            }
        }
        $this->renderPartial('_form_clinico_ser',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionUpdateitemcatcli($id=0){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $excli=new ServicioClinico;
        if($id!=0){
            $servicio=Servicio::model()->findByPk($id);
            $precio=$servicio->precioServicio;
        }
        else{
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
                    $excli=$servicio->servicioClinico;
                    $listaitem=ServicioClinico::model()->findAll(array(
                        'condition'=>"id_cat_cli ='{$servicio->servicioClinico->id_cat_cli}'",
                    ));
                    $this->renderPartial('_form_clinico_ser_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$servicio->servicioClinico->id_cat_cli));
                    return;
                }
            }
        }
        $this->renderPartial('_form_clinico_ser',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionUpdateitemcatenf($id=0){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $excli=new ServicioClinico;
        if($id!=0){
            $servicio=Servicio::model()->findByPk($id);
            $precio=$servicio->precioServicio;
        }
        else{
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
                    $excli=$servicio->servicioClinico;
                    $listaitem=ServicioClinico::model()->findAll(array(
                        'condition'=>"id_cat_cli ='{$servicio->servicioClinico->id_cat_cli}'",
                    ));
                    $this->renderPartial('_form_enfermeria_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$servicio->servicioClinico->id_cat_cli));
                    return;
                }
            }
        }
        $this->renderPartial('_form_clinico_ser',array('servicio'=>$servicio,'precio'=>$precio));
    }
    public function actionDeleteitemcatcli($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $excli=$servicio->servicioClinico;
        $cat_btn_item=$servicio->servicioClinico->id_cat_cli;
        $precio->delete();
        $excli->delete();
        $servicio->delete();
        $listaitem=ServicioClinico::model()->findAll(array(
            'condition'=>"id_cat_cli ='{$cat_btn_item}'",
        ));
        $this->renderPartial('_form_clinico_ser_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$cat_btn_item));
    }
    public function actionDeleteitemcatenf($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $excli=$servicio->servicioClinico;
        $cat_btn_item=$servicio->servicioClinico->id_cat_cli;
        $precio->delete();
        $excli->delete();
        $servicio->delete();
        $listaitem=ServicioClinico::model()->findAll(array(
            'condition'=>"id_cat_cli ='{$cat_btn_item}'",
        ));
        $this->renderPartial('_form_enfermeria_row',array('listaitemcli'=>$listaitem,'cat_cli_item'=>$cat_btn_item));
    }
    public function actionBuscarItemcliAjax(){
        $nombre= $_POST['cadena'];
        $catitem= $_POST['catitem'];
        $listaitemcat=Servicio::model()->findAll(array(
            'condition'=>"nombre_serv like '%{$nombre}%'",
        ));
        if($nombre==null){
            $listitemcli=ServicioClinico::model()->findAll(array(
                'condition'=>"id_cat_cli ='{$catitem}'",
            ));
        }
        else{
            $listitemcli=array();
            foreach($listaitemcat as $list):
                if($list->servicioClinico->id_cat_cli==$catitem){
                    $listitemcli[]=$list->servicioClinico;
                }
            endforeach;
        }
        $this->renderPartial('_form_clinico_ser_row',array('listaitemcli'=>$listitemcli,'cat_cli_item'=>$catitem));
    }
    public function actionBuscarItemenfAjax(){
        $nombre= $_POST['cadena'];
        $catitem= $_POST['catitem'];
        $listaitemcat=Servicio::model()->findAll(array(
            'condition'=>"nombre_serv like '%{$nombre}%'",
        ));
        if($nombre==null){
            $listitemcli=ServicioClinico::model()->findAll(array(
                'condition'=>"id_cat_cli ='{$catitem}'",
            ));
        }

        else{
            $listitemcli=array();
            foreach($listaitemcat as $list):
                if($list->servicioClinico->id_cat_cli==$catitem){
                    $listitemcli[]=$list->servicioClinico;
                }
            endforeach;
        }
        $this->renderPartial('_form_enfermeria_row',array('listaitemcli'=>$listitemcli,'cat_cli_item'=>$catitem));
    }
    public function actionCrearEnf(){
        $catEnfermeria=new CategoriaServicioClinico;
        $listaCategoriasServicio=CategoriaServicioClinico::model()->findAll();
        $resultado=false;
        foreach($listaCategoriasServicio as $list):
            if($list->nombre_cat_cli=="enfermeria"){
                $catEnfermeria=CategoriaServicioClinico::model()->findByPk($list->id_cat_cli);
                $listaitemcli=ServicioClinico::model()->findAll(array(
                    'condition'=>"id_cat_cli ='{$catEnfermeria->id_cat_cli}'",
                ));
                $resultado=true;break;
            }
        endforeach;
        if($resultado==false){
            $catEnfermeria->codigo_cat_cli="cat-enf";
            $catEnfermeria->nombre_cat_cli="enfermeria";
            $catEnfermeria->save();
            $listaitemcli=ServicioClinico::model()->findAll(array(
                'condition'=>"id_cat_cli ='{$catEnfermeria->id_cat_cli}'",));
        }
        $this->render('_form_enf',array('listaitemcli'=>$listaitemcli,'cat_cli_item'=>$catEnfermeria->id_cat_cli));
    }
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Servicio');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
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
    public function actionIndexAtencion(){
        $medicoEspecialidad=MedicoEspecialidad::model()->findAll();
        $atencionmedica=AtencionMedica::model()->findAll();
        $this->render('_form_aten',array('medicoEspecialidadlista'=>$medicoEspecialidad,'atencionmedica'=>$atencionmedica));
    }
    public function actionCrearServicioAtencion($id){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $atencion= new AtencionMedica;
        $medicoEspecialidad=MedicoEspecialidad::model()->findByPk($id);
        $medico=Medico::model()->findByPk($medicoEspecialidad->id_medico);
        $especialidad=Especialidad::model()->findByPk($medicoEspecialidad->id_especialidad);
        $this->renderPartial('_form_atencionservicio',array('servicio'=>$servicio,'precio'=>$precio,'medico'=>$medico,'especialidad'=>$especialidad,'id_m_e'=>$medicoEspecialidad->id_m_e,'atencion'=>$atencion));
    }
    public function actionRegistrarAtencion(){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $atencion= new AtencionMedica;
        if(isset($_POST['Servicio'],$_POST['PrecioServicio'],$_POST['AtencionMedica'],$_POST['MedicoEspecialidad'])){
            $medicoEspecialidad=MedicoEspecialidad::model()->findByPk($_POST['MedicoEspecialidad']['id_m_e']);
            $servicio->attributes=$_POST['Servicio'];
            $precio->attributes=$_POST['PrecioServicio'];
            $atencion->attributes=$_POST['AtencionMedica'];
            $val=$this->validar(array($servicio,$precio));
            if($val){
                $servicio->save(false);
                $precio->id_servicio=$servicio->id_servicio;
                $precio->save(false);
                $atencion->id_servicio=$servicio->id_servicio;
                $atencion->id_m_e=$medicoEspecialidad->id_m_e;
                $atencion->save(false);
                $atencionmedica=AtencionMedica::model()->findAll(array('order'=>'id_servicio ASC'));
                return $this->renderPartial('_form_lista_servicio_atencion',array('atencionmedica'=>$atencionmedica));
            }
            else{
                $medico=Medico::model()->findByPk($medicoEspecialidad->id_medico);
                $especialidad=Especialidad::model()->findByPk($medicoEspecialidad->id_especialidad);
                $this->renderPartial('_form_atencionservicio',array('servicio'=>$servicio,'precio'=>$precio,'medico'=>$medico,'especialidad'=>$especialidad,'id_m_e'=>$medicoEspecialidad->id_m_e,'atencion'=>$atencion));
            }
        }
    }
    public function actionListarEspecialidad(){
        $medicoEspecialidad=MedicoEspecialidad::model()->findAll();
        $this->renderPartial('_form_lista_medesp',array('medicoEspecialidadlista'=>$medicoEspecialidad));
        return;
    }
    public function actionActualizarAtencionMedica($id=0){
        $servicio=new Servicio;
        $precio=new PrecioServicio;
        $AtencionMedica=new AtencionMedica;
        if($id!=0){
            $servicio=Servicio::model()->findByPk($id);
            $precio=$servicio->precioServicio;
            $AtencionMedica=$servicio->atencionMedica;
            $medico=$AtencionMedica->idME->idMedico;
            $especialidad=$AtencionMedica->idME->idEspecialidad;
            $medicoEspecialidad=$AtencionMedica->idME->id_m_e;
            $this->renderPartial('_form_atencionservicio',array('servicio'=>$servicio,'precio'=>$precio,'medico'=>$medico,'especialidad'=>$especialidad,'id_m_e'=>$medicoEspecialidad,'atencion'=>$AtencionMedica));
            return;
        }
        else{
                $servicio=Servicio::model()->findByPk($_POST['Servicio']['id_servicio']);
                $medicoEspecialidad=MedicoEspecialidad::model()->findByPk($_POST['MedicoEspecialidad']['id_m_e']);
                $servicio->attributes=$_POST['Servicio'];
                $precio=$servicio->precioServicio;
                $precio->attributes=$_POST['PrecioServicio'];
                $AtencionMedica=$servicio->atencionMedica;
                $AtencionMedica->attributes=$_POST['AtencionMedica'];
                $val=$this->validar(array($servicio,$precio,$AtencionMedica));
                if($val){
                    $servicio->save(false);
                    $precio->id_servicio=$servicio->id_servicio;
                    $precio->save(false);
                    $AtencionMedica->id_servicio=$servicio->id_servicio;
                    $AtencionMedica->id_m_e=$medicoEspecialidad->id_m_e;
                    $AtencionMedica->save(false);
                    $AtencionMedica=AtencionMedica::model()->findAll(array('order'=>'id_servicio ASC'));
                    return $this->renderPartial('_form_lista_servicio_atencion',array('atencionmedica'=>$AtencionMedica));
                }
                else{
                    $medico=Medico::model()->findByPk($medicoEspecialidad->id_medico);
                    $especialidad=Especialidad::model()->findByPk($medicoEspecialidad->id_especialidad);
                    $this->renderPartial('_form_atencionservicio',array('servicio'=>$servicio,'precio'=>$precio,'medico'=>$medico,'especialidad'=>$especialidad,'id_m_e'=>$medicoEspecialidad->id_m_e,'atencion'=>$AtencionMedica));
                return;
                }
        }
    }
    public function actionEliminarAtencionMedica($id){
        $servicio=Servicio::model()->findByPk($id);
        $precio=$servicio->precioServicio;
        $atencion=$servicio->atencionMedica;
        $precio->delete();
        $atencion->delete();
        $servicio->delete();
        $AtencionMedica=AtencionMedica::model()->findAll(array('order'=>'id_servicio ASC'));
        return $this->renderPartial('_form_lista_servicio_atencion',array('atencionmedica'=>$AtencionMedica));
    }
}

