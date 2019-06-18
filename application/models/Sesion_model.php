<?php

class Sesion_model extends CI_Model
{

    public function crear($actividad, $monitor, $aulaId, $dia, $horaInicio, $horaFin)
    {
        $ok = false;

        $bean = R::findOne('sesion', 'hora_inicio=? and hora_fin=? and dia=? and tieneLugarEn=?', [$horaInicio, $horaFin, $dia, $aulaId]);
        $ok = ($bean == null);

        //R::debug();
        if ($ok) {
            $sesion = R::dispense('sesion');
            $sesion->seRealiza = R::load('actividad', $actividad);
            $sesion->imparte = R::load('monitor', $monitor);
            $sesion->tieneLugarEn = R::load('aula', $aulaId);
            $sesion->dia = $dia;
            $sesion->horaInicio = $horaInicio;
            $sesion->horaFin = $horaFin;

            R::store($sesion);
        }
        return $ok;
    }

    public function listarTodas()
    {
        return R::findAll('sesion', 'ORDER BY hora_inicio');
    }

    public function listar($aulaId)
    {
        return R::findAll('sesion', 'tiene_lugar_en_id=? ORDER BY hora_inicio',[$aulaId]);
    }
   

    /** Metodo backup */
    public function listarPorDia($aulaId,$dia)
    {
        return R::findAll('sesion', 'tiene_lugar_en_id=? AND dia=?',[$aulaId,$dia]);
        
    }

    public function comprobarHoras($aulaId, $dia, $horaInicio, $horaFin)
    {
       
        $comprobacion = R::getAll(
            'select * from sesion where tiene_lugar_en_id = :aulaId and dia = :dia and hora_inicio > 
            CAST(:hora_inicio AS TIME) and hora_fin < 
            CAST(:hora_fin AS TIME)',
            array(
                ':aulaId' => $aulaId,
                ':dia' => $dia,
                ':hora_inicio' => $horaInicio,
                ':hora_fin' => $horaFin
            )
        );

        $ok = ($comprobacion == null);

        return $ok;
    }


}
