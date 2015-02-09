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
                'actions'=>array('index'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $ConsultaModel = new Consulta;

        $this->render('index',array(
            'ConsultaModel'=>$ConsultaModel,
        ));
    }

    public function filterHistoriaContext($filterChain){
        $historia_id =null;
        if(isset($_GET['hid']))
            $historia_id=$_GET['hid'];
        else
            if(isset($_POST['hid']));
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