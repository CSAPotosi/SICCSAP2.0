<?php

class ConsultaController extends Controller{

    public $layout='//layouts/column2';
    private $_historia=null;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            'historiaContext',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','prueba'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $SVModelList=array();
        $aux=SignosVitales::model()->findAll();
        foreach($aux as $i)
            $SVModelList[]=new ConsultaSignosVitales;
        $ConsultaModel = new Consulta;
        $ConsultaModel->id_historia=$this->_historia->id;
        $this->render('index',array(
            'ConsultaModel'=>$ConsultaModel,
            'SVModelList'=>$SVModelList,
        ));
    }

    public function actionPrueba(){
        //var_dump($_POST['ConsultaSignosVitales']);
        echo 'qwe'+0;
        /*$consultaModel =  new Consulta;
        if (isset($_POST['Consulta'])){
            $consultaModel->attributes=$_POST['Consulta'];
            $consultaModel->id_historia=$this->_historia->id;
            if($consultaModel->save())
                $this->redirect(array('index','hid'=>$this->_historia->id));
        }
        $consultaModel->id_historia=$this->_historia->id;
        $this->render('index',array(
            'ConsultaModel'=>$consultaModel,
        ));*/
    }

    public function filterHistoriaContext($filterChain){
        $historia_id =null;
        if(isset($_GET['hid']))
            $historia_id=$_GET['hid'];
        else
            if(isset($_POST['hid']))
                $historia_id=$_POST['hid'];
        $this->loadHistoria($historia_id);
        $filterChain->run();
    }

    public function loadHistoria($id_historia){
        if($this->_historia===null){
            $this->_historia=HistorialPaciente::model()->findByPk($id_historia);
            if($this->_historia===null)
                throw new CHttpException(404,'La historia asociada no existe');
        }
        return $this->_historia;
    }
}