<?php

class ConsultaController extends Controller
{
  public function actionIndex()
  {

      $this->render('index',array());

  }
  public function actionMorbicos()
  {
      $this->render('_formantecedente',array());
  }
}
