<?php
class ImportController extends Controller
{
    public function actionCsv()
    {
        $model = new CsvForm();
        if(isset($_POST['CsvForm']))
        {
            $model->attributes=$_POST['CsvForm'];
            if($model->validate())
            {
                $uf=CUploadedFile::getInstance($model,'archivo');
                if($uf->getExtensionName()=="dat" or $uf->hetExtensionName()=="txt")
                {
                    $i=0;
                    $archi=fopen($uf->gettempName(),"r");

                    /**while(($data=fgetcsv($archi,1000000,";"))!=FALSE)
                    {
                        $model=new Registro();

                        foreach($data as $row)
                        {
                            $var[$i]=$row;
                            $i++;
                        }
                        $model->codigo=utf8_decode($var[0]);
                        $model->fecha_hora_registro=utf8_decode($var[1]);
                        $model->observaciones=utf8_decode($var[2]);
                        $i=0;
                        $model->save();
                    }**/
                    while(!feof($archi))
                    {
                        $linea=fgets($archi);
                        sscanf($linea,"%d %s %s",$a,$b,$c);
                        $model= new Registro();
                        $model->fecha=$b;
                        $model->hora_asistencia=$c;
                        $model->id_asignacion=$model->getAsignacion($a);
                        $model->save();
                    }
                    fclose($archi);

                    /**
                    if(!$uf==null)
                    {
                        while(!feof($archi))
                        {

                        }
                    }else
                    {
                        Yii::app()->setFlash('mensaje','Se a producido un Error');
                        $this->refresh();
                    }
                     **/
                }
                $uf->saveAs(Yii::getPathOfAlias('webroot').'/archivo/'.$uf->getName());
            }else
            {
                /**
                Yii::app()->setFlash('mensaje','Se a producido un Error');
                $this->refresh();
                **/
            }
        }

        $this->render('Csv',array('model'=>$model));
    }

}
