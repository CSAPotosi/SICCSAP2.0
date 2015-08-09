<?php

class Cie10Controller extends Controller
{
    public $layout='//layouts/column2';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCargaCategoria(){

        if(isset($_POST['capitulo'])&&$_POST['capitulo']!=''){
            echo CHtml::tag('option',array('value'=>''),CHtml::encode('SELECCIONE UNA CATEGORIA'),true);
            $categorias=CategoriaCie10::model()->findAll("num_capitulo='{$_POST['capitulo']}'");
            $data=CHtml::listData($categorias,'id_cat_cie10','titulo_cat_cie10');
            foreach($data as $id=>$nombre)
                echo CHtml::tag('option',array('value'=>$id),CHtml::encode($nombre),true);
        }
        else
            echo CHtml::tag('option',array('value'=>''),CHtml::encode('ANTES SELECCIONE UN CAPITULO'),true);
        //header("Content-type: application/json");
        //echo CJSON::encode($categorias);
    }

    public function actionCargaGrupo(){
        if(isset($_POST['categoria'])&&$_POST['categoria']!=''){
            echo CHtml::tag('option',array('value'=>''),CHtml::encode('SELECCIONE UN GRUPO'),true);
            $grupo=ItemCie10::model()->findAll("id_cat_cie10='{$_POST['categoria']}' and codigo_item_padre = codigo");
            $data=CHtml::listData($grupo,'codigo','titulo');
            foreach($data as $id=>$nombre)
                echo CHtml::tag('option',array('value'=>$id),CHtml::encode($nombre),true);
        }
        else
            echo CHtml::tag('option',array('value'=>''),CHtml::encode('ANTES SELECCIONE UNA CATEGORIA'),true);
    }

    public function actionCargaItem(){
        if(isset($_POST['grupo'])&&$_POST['grupo']!=''){
            $items=ItemCie10::model()->findAll("codigo_item_padre ='{$_POST['grupo']}' or codigo='{$_POST['grupo']}'");
            $data=CHtml::listData($items,'codigo','titulo');
            foreach($data as $id=>$nombre){
                echo "<tr value='{$id}'><td>{$id}</td><td>{$nombre}</td></tr>";
            }
        }
        else
            echo "<tr value=''><td>No se encontraron resultados</td></tr>";

    }

    public function actionBuscaItem(){
        if(isset($_POST['buscador'])&&$_POST['buscador']!=''){
            $items=ItemCie10::model()->findAll("codigo like '%{$_POST['buscador']}%' or titulo like '%{$_POST['buscador']}%' or descripcion like '%{$_POST['buscador']}%'");
            $data=CHtml::listData($items,'codigo','titulo');
            foreach($data as $id=>$nombre){
                echo "<tr  value='{$id}'><td>".str_replace($_POST['buscador'],"<b>".$_POST['buscador']."</b>",$id)."</td><td>".str_replace($_POST['buscador'],"<b>".$_POST['buscador']."</b>",$nombre)."</td></tr>";
            }
        }
        else
            echo "<tr value=''><td>No se encontraron resultados</td></tr>";
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