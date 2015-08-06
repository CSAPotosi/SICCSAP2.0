<?php

class CirugiaController extends Controller
{
	public function actionProgramarCirugia($id_h=0)
	{
        $model= HistorialPaciente::model()->findByPk($id_h);
        $modelCirugia= new Cirugia();
        $modelCirugia->id_historial=$model->id_historial;
        $modelParticipe= new ParticipanteCirugia();
		$this->render('programarCirugia',['model'=>$model,'modelCirugia'=>$modelCirugia,'modelParticipe'=>$modelParticipe]);
	}

    public function actionProgramarCirugiaAjax(){
        $modelCirugia= new Cirugia();
        $modelParticipe= new ParticipanteCirugia();
        if(isset($_POST['Cirugia'],$_POST['ParticipanteCirugia'])){
            $modelCirugia->attributes=array_map('strtoupper',$_POST['Cirugia']);
            $modelCirugia->scenario='programacion';
            $modelParticipe->attributes=array_map('strtoupper',$_POST['ParticipanteCirugia']);
            if($modelParticipe->validate()&&$modelCirugia->validate()){
                $modelCirugia->save(false);
                $modelParticipe->id_c=$modelCirugia->id_c;$modelParticipe->save(false);
                echo $modelCirugia->historial->paciente->personapa->nombreCompleto;
                return '';
            }
        }
        return $this->renderPartial('_formCirugia',['modelCirugia'=>$modelCirugia,'modelParticipe'=>$modelParticipe]);
    }

    public function actionLoadBuscadorAjax(){
        $listaPersonas= array();
        $this->renderPartial('_buscadorSimple',['listaPersonas'=>$listaPersonas]);

    }

    public function actionLoadListaPersonas($tipo='MEDICO',$valor=''){
        $listaPersonas=array();
        if($valor!=null){
            if($tipo=='MEDICO')
                $listaPersonas= Persona::model()->findAll("id in (select id from medico) and concat_ws(' ',primer_apellido,segundo_apellido,nombres) like '%{$valor}%'");
            else
                $listaPersonas= Persona::model()->findAll("id not in (select id from medico) and concat_ws(' ',primer_apellido,segundo_apellido,nombres) like '%{$valor}%'");
        }
        $this->renderPartial('_listaPersonas',['listaPersonas'=>$listaPersonas]);
    }

    public function actionCreateCirugia($id_h=0,$id_c=0){
        $model= ($id_h!=0)?HistorialPaciente::model()->findByPk($id_h):new HistorialPaciente();
        $modelCirugia= ($id_c!=0)?Cirugia::model()->findByPk($id_c):new Cirugia();
        if($modelCirugia!=null)
            $model=$modelCirugia->historial;

        return $this->render('_createCirugia',['model'=>$model]);
    }

    public function actionAgenda(){
        return $this->render('agenda',['listaProg'=>Cirugia::model()->findAll("estado_cirugia='PROGRAMADA'")]);
    }

    public function actionRemoveCirugiaAjax($id_c=0){
        $modelC=Cirugia::model()->findByPk($id_c);
        foreach($modelC->participantes as $item)
            $item->delete();
        $modelC->delete();
    }

    public function actionUpdateCirugia($id_c=0){
        $modelCirugia= new Cirugia();//
        $model=new HistorialPaciente();
        $modelParticipe= new ParticipanteCirugia();
        if($id_c!=0){
            $modelCirugia= Cirugia::model()->findByPk($id_c);
            $model= $modelCirugia->historial;
            $modelParticipe= $modelCirugia->responsable;
        }
        if(isset($_POST['Cirugia'],$_POST['ParticipanteCirugia'])){
            $modelCirugia->attributes=array_map('strtoupper',$_POST['Cirugia']);
            $modelCirugia->scenario='programacion';$modelParticipe->delete();
            $modelParticipe=new ParticipanteCirugia();
            $modelParticipe->attributes=array_map('strtoupper',$_POST['ParticipanteCirugia']);
            if($modelParticipe->validate()&&$modelCirugia->validate()){
                $modelCirugia->save(false);
                $modelParticipe->id_c=$modelCirugia->id_c;$modelParticipe->save(false);
                echo $modelCirugia->historial->paciente->personapa->nombreCompleto;
                return $this->redirect(['updateCirugia','id_c'=>$modelCirugia->id_c]);
            }
        }
        $this->render('reprogramarCirugia',['model'=>$model,'modelCirugia'=>$modelCirugia,'modelParticipe'=>$modelParticipe]);
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}