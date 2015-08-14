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

    public function actionReporteServiciosGabinete()
    {
        $serviciogabinete=Servicio::model()->findAll();
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('servicioGabinete',['servicios'=>$serviciogabinete],true));
        $mPDF1->Output();
    }
    public function actionReporteServiciosLaboratorio(){
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('servicioLaboratorio',[],true));
        $mPDF1->Output();
    }
    public function actionReporteServiciootros(){
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('servicioOtros',[],true));
        $mPDF1->Output();
    }
    public function actionReportePacientesRegistrados(){
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->AddPage('L');
        $mPDF1->WriteHTML($this->renderPartial('ReportePacientesPacientes',[],true));
        $mPDF1->Output();
    }
    public function actionReporteSegurosPacienteServicio(){
        $this->render('SegurosConvenioPaciente',array());
    }
    public function actionReporteConveniosCompleto(){
        $convenio="";$servicio="";
        if(isset($_POST['convenio']))
            $convenio=$_POST['convenio'];
        if(isset($_POST['servicios']))
            $servicio=$_POST['servicios'];
        $convenioinstitucion=ConvenioInstitucion::model()->findByPk($_POST['Convenioseguros']);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('ReporteCompletoConvenios',['convenioinsti'=>$convenioinstitucion,'asegurados'=>$convenio,'servicios'=>$servicio],true));
        $mPDF1->Output();
    }

    public function actionConsulta($id_consulta=0){
        $consulta=Consulta::model()->findByPk($id_consulta);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->WriteHTML($this->renderPartial('consulta',['consulta'=>$consulta],true));
        $mPDF1->Output();
    }

    public function actionReceta($id_trat=0){
        $modelTratamiento=Tratamiento::model()->findByPk($id_trat);
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->addPage('L');
        $mPDF1->WriteHTML($this->renderPartial('receta',['modelTratamiento'=>$modelTratamiento],true));
        $mPDF1->Output();
    }
}