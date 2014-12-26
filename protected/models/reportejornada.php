<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 26/12/14
 * Time: 12:29
 */

class reportejornada {
    public $registroentrada;//modelo registro, datos de la entrada de jornada
    public $registrosalida;//modelo registro, datos de la salida de jornada
    public $horastrabajadas;//horas trabajadas por jornada
    public $tiempoextra;//
    public $tiemporetrazo;//
    public $turno;//modelo turno
    public $fecha;//fecha de la jornada
    public $observacion;//
    public $estado;//verdadero si hay todos los tickeos, en otro caso falso
    function reportejornada($id_asignacion,$fecha,$id_turno){

    }
}