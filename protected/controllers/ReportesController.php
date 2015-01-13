<?php
class ReportesController extends Controller
{
    public function actionReportegeneral()
    {
        $model=new Reporte(1,'12/12/12','12/12/12');
        $this->render('reportegeneral',array('model'=>$model));
    }
    public function actionElegirempleado()
    {

    }
}