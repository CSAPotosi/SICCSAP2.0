<?php

class ConsultaController extends Controller{

    public $layout='//layouts/column2';
    private $_historia=null;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            'historiaContext + index,listConsulta',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','createConsultaAjax','listConsulta','loadConsultaAjax','NuevoAntecedente','CrearAntecedente'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionListConsulta(){
        $id_historia=$this->_historia->id_historial;
        $listaConsulta=new CActiveDataProvider('Consulta',array(
            'criteria'=>array(
                'condition'=>"id_historia={$id_historia} and id_consulta_padre is null",
                'order'=>'fecha_diagnostico DESC',
            ),
            'pagination'=>false,
        ));

        $this->render('listConsulta',array(
            'listaConsulta'=>$listaConsulta,
            'historiaModel'=>HistorialPaciente::model()->findByPk($id_historia),
        ));
    }
    public function actionIndex($cid=0)
    {
        $AntecedenteMedico=new AntecedenteMedico;
        $TipoAntecente=new TipoAntecedente;
        $listaAntecedentesMedico=AntecedenteMedico::model()->FindAll();
        $svModel= SignosVitales::model()->findAll();
        $listaante=TipoAntecedente::model()->FindAll();
        $listaSV=array();
        $genero='';
        $his="";
        foreach($svModel as $item){
            $model= new ConsultaSignosVitales;
            $model->id_sv=$item->id_sv;
            $listaSV[]=$model;
        }
        if($cid==0){
            $consultaModel = new Consulta;
            $consultaModel->id_historia = $this->_historia->id_historial;
            $genero=Persona::model()->findByPk($consultaModel->id_historia);
        }
        else{
            $consultaModel=Consulta::model()->findByPk($cid);
            $genero=Persona::model()->findByPk($consultaModel->id_historia);
        }
        $his=$this->_historia->id_historial;
        $this->render('index',array(
            'TipoAntecedente'=>$TipoAntecente,
            'genero'=>$genero,
            'consulta_id'=>$cid,
            'consultaModel'=>$consultaModel,
            'listaSV'=>$listaSV,
            'listaAntecedenteMedico'=>$listaAntecedentesMedico,
            'AntecedenteMedico'=>$AntecedenteMedico,
            'TipoAntecente'=>$TipoAntecente,
            'listaante'=>$listaante,
            'his'=>$his,
        ));
    }
    public function actionCrearAntecedente()
    {
        $model=new TipoAntecedente;
        $model->attributes=$_POST['TipoAntecedente'];
        $model->save();
        $contenido=TipoAntecedente::model()->FindAll();
        $contador=0;
        foreach($contenido as $cont){
            $contador++;
        }
        header('Content-Type:application/json;');
        echo CJSON::encode(array('success'=>true,'descripcion'=>$model->descripcion,'titulo'=>$model->titulo,'contador'=>$contador,'id'=>$model->id_tipo_ant));
    }
    public function actionNuevoAntecedente()
    {
            $antecedentes=new AntecedenteMedico;
            $var=TipoAntecedente::model()->findByPk((int)$_POST['AntecedenteMedico']['id_tipo']);
            $antecedentes->descripcion_ant=$_POST['AntecedenteMedico']['descripcion_ant'];
            $antecedentes->id_historia=$_POST['AntecedenteMedico']['id_historia'];
            $antecedentes->id_tipo=$var->id_tipo_ant;
            $antecedentes->save();
            $titulotabla=$var->titulo;
            $variable=TipoAntecedente::model()->findByPk($antecedentes->id_tipo);
            header('Content-Type:application/json;');
            echo CJSON::encode(array('success'=>true,'fechaCreacion'=>$antecedentes->fecha_creacion,'fechaModificacion'=>$antecedentes->fecha_modificacion,'descripcion_ant'=>$antecedentes->descripcion_ant,'tipo'=>$variable->titulo));


    }
    public function actionCreateConsultaAjax(){
        /*if(isset($_POST['CIE10'])){
            foreach($_POST['CIE10'] as $item)
                var_dump($item);
            Yii::app()->end();
        }
        else
            echo 'nada';*/
        $consulta= new Consulta;
        $listaSV=array();
        if(isset($_POST['Consulta'])){
            $consulta->attributes=array_map('strtoupper',$_POST['Consulta']);
            if($consulta->save()){
                if(isset($_POST['ConsultaSignosVitales'])){
                    foreach($_POST['ConsultaSignosVitales'] as $itemSV){
                        $modelSV = new ConsultaSignosVitales;
                        $modelSV->attributes=array_map('strtoupper',$itemSV);
                        if($modelSV->valor!='' && $modelSV->validate()){
                            $modelSV->id_consulta=$consulta->id_consulta;
                            $modelSV->save();
                        }
                    }
                }
                return $this->renderPartial('_detalleConsulta',array('detalleConsulta'=>Consulta::model()->findByPk($consulta->id_consulta)));
            }

        }
        return $this->renderPartial('_formConsulta',array('consultaModel'=>$consulta,'listaSV'=>$listaSV));
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
            $consultaModel->id_historia=$this->_historia->id_historial;
            if($consultaModel->save())
                $this->redirect(array('index','hid'=>$this->_historia->id_historial));
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

    public function actionLoadConsultaAjax(){
        $listaConsulta=Consulta::model()->findAll("fecha_diagnostico between '{$_POST['inicio']}' and (timestamp '{$_POST['fin']}'+ time '23:59:59') order by fecha_diagnostico DESC");
        if($listaConsulta==null)
            echo "No se han encontrado resultados";
        else{
            $con=1;
            foreach($listaConsulta as $itemConsulta){
                $clase=($con%2==0)?'even':'odd';$con++;
                echo '<tr class="'.$clase.'">';
                echo "<td>".date('d/m/Y',strtotime($itemConsulta->fecha_diagnostico))."</td>";
                echo "<td>".date("h:i A",strtotime($itemConsulta->fecha_diagnostico))."</td>";
                echo "<td>{$itemConsulta->diagnosticoCorto}</td>";
                echo "<td>{$itemConsulta->observaciones}</td>";
                echo "<td class='button-column'>".CHtml::link('<i class="fa fa-eye"></i>',array('/consulta','hid'=>$itemConsulta->id_historia,'cid'=>$itemConsulta->id_consulta))."</td>";
                echo '</tr>';

            }

        }

    }
}