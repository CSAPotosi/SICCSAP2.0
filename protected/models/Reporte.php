<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 26/12/14
 * Time: 12:20
 */

class Reporte extends CFormModel{
    public $id_empleado;//int
    public $per;//modelo persona
    public $uni;//nombre de unidad
    public $car;//nombre de cargo
    public $lista_jornada;//lista de modelos reportejornada
    public $totaltrabajado=0;//total horas trabajadas
    public $totaltiempoextra=0;//total tiempo extra
    public $totaltiemporetraso=0;//total tiempo de retrazo
    public $totaldiastrabajados=0;//total dias trabajados
    public $correcto=true;
    function  Reporte($id_empleado,$fechainicio,$fechafin){
        $this->id_empleado=$id_empleado;
        $this->per=$this->loadPersona($this->id_empleado);
        if($this->per!=NULL){
            $asig=$this->loadAsignacion($this->per->id,$fechafin);
            if($asig!=null){

                $cargo=$this->car=Cargo::model()->find(array(
                    'condition'=>'id_cargo=:car',
                    'params'=>array(':car'=>$asig->id_cargo)
                ));
                $this->car=$cargo->nombre_cargo;

                $unidad=Unidad::model()->find(array(
                    'condition'=>'id_unidad=:uni',
                    'params'=>array(':uni'=>$cargo->id_unidad)
                ));
                $this->uni=$unidad->nombre_unidad;

                $this->lista_jornada=$this->loadData(new DateTime($fechainicio),new DateTime($fechafin),$asig);
                $this->correcto=true;
            }
        }
        $this->correcto=false;

    }
    public function loadPersona($id){
        $model=Persona::model()->findByPk($id);
        return $model;
    }

    public function loadAsignacion($id_emp,$fecha){
        $model=AsignacionEmpleado::model()->find(array(
            'condition'=>'id_empleado=:id
            AND ((fecha_fin is null and :fecha between fecha_inicio and now())
            OR (:fecha between fecha_inicio and fecha_fin))',
            'params'=>array(':id'=>$id_emp,':fecha'=>$fecha)
        ));
        return $model;
    }
    public function loadTurnos($id_h){
        return Turno::model()->findAll(array(
            'condition'=>'id_horario=:id order by hora_entrada asc',
            'params'=>array(':id'=>$id_h)
        ));
    }
    public function loadData($fecha_ini,$fecha_fin,$asig){
        $f=new DateTime();
        $lista=array();
        $turnos=$this->loadTurnos($asig->id_horario);
        for($f=$fecha_ini;$f<=$fecha_fin;$f->add(new DateInterval('P1D'))){
            $flag=true;
            foreach($turnos as $item){
                $aux = new ReporteJornada($asig->id_asignacion,$f->format('Y-m-d'),$item->id_turno);
                $lista[]=$aux;
                $flag=($flag&&$aux->estado);
                $this->totaltiempoextra+=$aux->tiempoextra;
                $this->totaltiemporetraso+=$aux->tiemporetraso;
            }
            $this->totaldiastrabajados+=($flag)?1:0;
        }
        return $lista;
    }
}