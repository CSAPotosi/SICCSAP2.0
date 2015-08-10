<?php
class ReportesController extends Controller
{


    public function actionReporteKardex($id_inter=0){
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('/reportes/reporteKardex',['modelInternacion'=>Internacion::model()->findByPk($id_inter)],true));
        $mPDF1->Output();
    }

    public function actionReporteResultadoLaboratorio($id_det=0){
        $modelDetalle= DetalleSolicitudServicio::model()->findByPk($id_det);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('resultadoExamen',['modeloDetalle'=>$modelDetalle],true));
        $mPDF1->Output();
    }

    public function actionReportegeneral()
    {
        $model=new Reporte(1,'12/12/12','12/12/12');
        $this->render('reportegeneral',array('model'=>$model));
    }


    public function actionCensoSalas(){
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('censoSalasDia',['modeloDetalle'=>$modelDetalle],true));
        $mPDF1->Output();
    }

    public function actionElegirempleado()
    {
        return;
    }


}