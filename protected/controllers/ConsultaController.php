<?php

class ConsultaController extends Controller{

    public $layout='//layouts/column2';
    private $_historia=null;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            'historiaContext + index',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','createConsultaAjax'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex($cid=0)
    {
        /*
        $SVModelList=array();
        $aux=SignosVitales::model()->findAll();
        foreach($aux as $i)
            $SVModelList[]=new ConsultaSignosVitales;
        $this->render('index',array(
            'SVModelList'=>$SVModelList,
        ));


        */
        if($cid==0){
            $consultaModel = new Consulta;
            $consultaModel->id_historia = $this->_historia->id;
        }
        else{
            $consultaModel=Consulta::model()->findByPk($cid);
        }

        $this->render('index',array(
            'consulta_id'=>$cid,
            'consultaModel'=>$consultaModel,
        ));
    }


    public function actionCreateConsultaAjax(){
        $consulta= new Consulta;
        if(isset($_POST['Consulta'])){
            $consulta->attributes=array_map('strtoupper',$_POST['Consulta']);
            if($consulta->save())
                return $this->renderPartial('_detalleConsulta',array('detalleConsulta'=>Consulta::model()->findByPk($consulta->id_consulta)));
        }
        return $this->renderPartial('_formConsulta',array('consultaModel'=>$consulta));
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
        $consultaModel = new Consulta;
        if(isset($_POST['Consulta'])){
            $consultaModel->attributes=array_map('strtoupper',$_POST['Consulta']);
            $consultaModel->id_historia=$this->_historia->id;
            if($consultaModel->save())
                $this->redirect(array('index','hid'=>$this->_historia->id));
        }

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