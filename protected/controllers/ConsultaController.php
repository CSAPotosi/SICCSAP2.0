<?php

class ConsultaController extends Controller{

    public $layout='//layouts/column2';
    private $_historia=null;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            'historiaContext + index,listConsulta,viewAntecedente',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','viewAntecedente','createConsultaAjax','listConsulta','loadConsultaAjax','NuevoAntecedente','CrearAntecedente','loadFormTratamientoAjax','createTratamientoAjax','loadDetalleTratamientoAjax','loadMedicamento','createEvolucionAjax','viewTratamiento'),
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
        $listaAntecedentesMedico=AntecedenteMedico::model()->findAll();
        $svModel= SignosVitales::model()->findAll();
        $listaante=TipoAntecedente::model()->findAll();
        $detalle=new DetalleSolicitudServicio;
        $solicitud=new SolicitudServicios;
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
            'detsolser'=>$detalle,
            'solicitud'=>$solicitud,
        ));
    }

    public function actionViewAntecedente($cid=0){
        $AntecedenteMedico=new AntecedenteMedico;
        $TipoAntecente=new TipoAntecedente;
        $listaAntecedentesMedico=AntecedenteMedico::model()->findAll();
        $svModel= SignosVitales::model()->findAll();
        $listaante=TipoAntecedente::model()->findAll();
        $detalle=new DetalleSolicitudServicio;
        $solicitud=new SolicitudServicios;
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
        $this->render('fichaTratamiento',[
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
            'detsolser'=>$detalle,
            'solicitud'=>$solicitud,
        ]);
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

    public function actionLoadFormTratamientoAjax($id=0,$id_con=0){
        $modelTratamiento= Tratamiento::model()->findByPk($id);
        if($modelTratamiento==null){
            $modelTratamiento= new Tratamiento();
            $modelTratamiento->id_consulta=$id_con;
        }
        $this->renderPartial('_formTratamiento',['modelTratamiento'=>$modelTratamiento,'listaReceta'=>array()]);
    }

    public function actionLoadTableTratamiento($id_con=0){
        $listaTratamiento=Tratamiento::model()->findAll(['condition'=>"id_consulta={$id_con}",'order'=>'fecha_trat DESC']);
        $this->renderPartial('_tableTratamiento',['listaTratamiento'=>$listaTratamiento]);
    }

    public function actionCreateTratamientoAjax(){
        $modelTratamiento= new Tratamiento();
        $modelTratamiento->attributes=array_map('strtoupper',$_POST['Tratamiento']);
        $listaReceta=array();
        foreach($_POST['Receta'] as $item){
            $auxR=new Receta();
            $auxR->attributes=array_map('strtoupper',$item);
            if($auxR->id_med!=""||$auxR->id_med!=null)
                $listaReceta[]=$auxR;
        }

        $flag=$this->validar(array_merge([$modelTratamiento],$listaReceta));
        if($flag){
            $modelTratamiento->save(false);
            foreach($listaReceta as $itemR){
                $itemR->id_trat=$modelTratamiento->id_trat;
                $itemR->save(false);
            }
            return $this->renderPartial('_tableTratamiento',['listaTratamiento'=>Tratamiento::model()->findAll(['condition'=>"id_consulta={$modelTratamiento->id_consulta}",'order'=>'fecha_trat DESC'])]);
        }
        return $this->renderPartial('_formTratamiento',['modelTratamiento'=>$modelTratamiento,'listaReceta'=>$listaReceta]);
    }

    public function actionLoadDetalleTratamientoAjax($id_trat=0){
        $modelTratamiento=Tratamiento::model()->findByPk($id_trat);
        return $this->renderPartial('_detalleTratamiento',['modelTratamiento'=>$modelTratamiento]);
    }


    public function actionLoadMedicamento(){
        //$jsonLista=['juan perez','pedro rodriguwz','maria marque','asdqwe qwewq','jose ro'];
        $jsonLista=Medicamento::model()->findAll();
        header('Content-Type:application/json');
        echo CJSON::encode($jsonLista);
    }


    public function actionCreateEvolucionAjax($id_trat=0){
        $modelEvo= new Evolucion();
        $modelEvo->id_trat=$id_trat;
        if(isset($_POST['Evolucion'])){
            $modelEvo->attributes=$_POST['Evolucion'];
            if($modelEvo->validate()){
                $modelEvo->save(false);
                echo $modelEvo->id_trat;
                return;
            }
        }
        return $this->renderPartial('_formEvolucion',['modelEvo'=>$modelEvo]);
    }

    public function validar($lista=array()){
        $flag=true;
        foreach($lista as $item){
            $flag=$flag&&$item->validate();
        }
        return $flag;
    }
}