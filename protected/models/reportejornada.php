<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 26/12/14
 * Time: 12:29
 */

class ReporteJornada extends CFormModel{
    public $esvalido=true;
    public $registroentrada=null;//modelo registro, datos de la entrada de jornada
    public $registrosalida=null;//modelo registro, datos de la salida de jornada
    public $horastrabajadas=0;//horas trabajadas por jornada
    public $tiempoextra=0;//
    public $tiemporetraso=0;//
    public $turno;//modelo turno
    public $fecha;//fecha de la jornada
    public $observacion;//hhhhhhhhhhhhhhhhhhhhhhhh
    public $estado;//verdadero si hay todos los tickeos, en otro caso falso

    function ReporteJornada($id_asignacion,$fecha,$id_turno){
        $this->fecha=$fecha;

        $this->turno=$this->loadTurno($id_turno);
        $flag_entrada=$flag_salida=false;
        if($this->turno==null)
            $esvalido=false;

        $this->registroentrada=Registro::model()->find(array(
            'condition'=>'id_asignacion=:id_asignacion
                         AND fecha=:fecha
                         AND hora_asistencia between (:hora_entrada-(:hora_inicio* interval \'1 minute\'))  AND (:hora_entrada+(:hora_fin* interval \'1 minute\'))',
            'params'=>array(':id_asignacion'=>$id_asignacion,':fecha'=>$fecha,
                ':hora_inicio'=>$this->turno->inicio_entrada,':hora_fin'=>$this->turno->fin_entrada,
                ':hora_entrada'=>$this->turno->hora_entrada),
        ));
        if($this->registroentrada!=null)
            $flag_entrada=true;

        if($this->turno->tipo_turno=='DIA'&&$flag_entrada){
            $this->registrosalida=Registro::model()->find(array(
                'condition'=>'id_asignacion=:id_asignacion
                             AND fecha + 1=:fecha
                             AND hora_asistencia between (:hora_salida-(:hora_inicio* interval \'1 minute\'))  AND (:hora_salida+(:hora_fin* interval \'1 minute\'))',
                'params'=>array(':id_asignacion'=>$id_asignacion,':fecha'=>$fecha,
                    ':hora_inicio'=>$this->turno->inicio_salida,':hora_fin'=>$this->turno->fin_salida,
                    ':hora_entrada'=>$this->turno->hora_salida),
            ));
            if($this->registrosalida!=null)
                $flag_salida=true;
            else{
                $this->registroentrada=null;
                $this->esvalido=false;
            }
        }
        else{

            $this->registrosalida=Registro::model()->find(array(
                'condition'=>'id_asignacion=:id_asignacion
                             AND fecha=:fecha
                             AND hora_asistencia between (:hora_salida-(:hora_inicio* interval \'1 minute\'))  AND (:hora_salida+(:hora_fin* interval \'1 minute\'))',
                'params'=>array(':id_asignacion'=>$id_asignacion,':fecha'=>$fecha,
                    ':hora_inicio'=>$this->turno->inicio_salida,':hora_fin'=>$this->turno->fin_salida,
                    ':hora_salida'=>$this->turno->hora_salida),
            ));
            if($this->registrosalida!=null)
                $flag_salida=true;

            $this->estado = $flag_entrada &&$flag_salida;
        }

        if($this->estado){
            $flag_salida=$flag_entrada=false;
            $h_in= new DateTime($this->turno->hora_entrada);
            $h_fin=new DateTime($this->turno->hora_entrada); $h_fin->add(new DateInterval('PT'.$this->turno->tolerancia.'M'));
            $hora=new DateTime($this->registroentrada->hora_asistencia);
            if($h_in<=$hora && $hora<=$h_fin){
                $hora= $h_in;
                $flag_entrada=true;
            }

            $min_ent=(($hora->format('H')*60)+($hora->format('i')));

            if(!$flag_entrada){
                $aux=(($h_in->format('H')*60)+($h_in->format('i')));
                $this->tiempoextra+=((($aux-$min_ent)<0)?0:$aux-$min_ent);

                $aux=(($h_fin->format('H')*60)+($h_fin->format('i')));
                $this->tiemporetraso+=((($min_ent-$aux)<0)?0:$min_ent-$aux);
            }

            $h_in= new DateTime($this->turno->hora_salida);
            $h_fin=new DateTime($this->turno->hora_salida); $h_fin->add(new DateInterval('PT'.$this->turno->tolerancia.'M'));
            $hora_s=new DateTime($this->registrosalida->hora_asistencia);
            if($h_in<=$hora_s && $hora_s<=$h_fin){
                $hora_s= $h_in;
                $flag_salida=true;
            }

            $min_sal=(($hora_s->format('H')*60)+($hora_s->format('i')));
            if(!$flag_salida){
                $aux=(($h_in->format('H')*60)+($h_in->format('i')));
                $this->tiemporetraso+=((($aux-$min_sal)<0)?0:$aux-$min_sal);

                $aux=(($h_fin->format('H')*60)+($h_fin->format('i')));
                $this->tiempoextra+=((($min_sal-$aux)<0)?0:$min_sal-$aux);
            }

            if($this->turno->tipo_turno=='DIA')
                $this->horastrabajadas+=($min_sal+(1440-$min_ent));
            else
                $this->horastrabajadas+=($min_sal-$min_ent);

        }
    }

    public function loadTurno($id)
    {
        $model=Turno::model()->findByPk($id);
        if($model===null)
            return null;
        return $model;
    }


}