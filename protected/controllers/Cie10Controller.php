<?php

class Cie10Controller extends Controller
{
    public $layout='//layouts/column2';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCargaCategoria(){

        $categorias=CategoriaCie10::model()->findAll(array(
            'condition'=>'num_capitulo=:numero',
            'params'=>array(':numero'=>$_POST['capitulo'])
        ));

        header("Content-type: application/json");
        echo CJSON::encode($categorias);
    }

    public function actionCargaGrupo(){
        $grupo=ItemCie10::model()->findAll(array(
            'condition'=>'id_cat_cie10=:id_cat and codigo_item_padre is null',
            'params'=>array(':id_cat'=>$_POST['categoria'])
        ));

        header('Content-type: application/json');
        echo CJSON::encode($grupo);
    }

    public function actionCargaItem(){
        $item=ItemCie10::model()->findAll(array(
            'condition'=>' codigo_item_padre =:padre or codigo=:padre',
            'params'=>array(':padre'=>$_POST['grupo'])
        ));

        header('Content-type: application/json');
        echo CJSON::encode($item);
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