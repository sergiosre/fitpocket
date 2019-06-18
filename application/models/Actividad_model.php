<?php

class Actividad_model extends CI_Model
{

    public function crear($nombre, $info, $impacto, $img)
    {
        $ok = false;

        $bean = R::findOne('actividad', 'nombre=?', [$nombre]);
        $ok = ($bean == null);

        if ($ok) {
            $actividad = R::dispense('actividad');
            $actividad->nombre = $nombre;
            $actividad->info = $info;
            $actividad->impacto = $impacto;

            if ($img == "none") {

                $actividad->img;
            } else {
                $actividad->img = $img;
            }

            R::store($actividad);
        }
        return $ok;
    }

    public function buscarActividadByNombre($nombre)
    {
        $ok = false;
        $bean = R::findOne('actividad', 'nombre=?', [$nombre]);
        $ok = ($bean == null);
        return $ok;
    }

    public function listar()
    {
        return R::findAll('actividad');
    }

    public function getActividadById($actividad_id)
    {
        return R::findOne('actividad', 'id=?', [$actividad_id]);
    }


    public function update($id, $nombre, $info,$impacto){

        $actividad = R::load('actividad',$id);
        $actividad->nombre = $nombre;
        $actividad->info = $info;
        $actividad->impacto = $impacto;
        
        R::store($actividad);
        return true;
    }
    // public function update($id, $nombre_nuevo)
    // {
    //     $ok = false;

    //     $bean = R::findOne('aficion', 'id=?', [$id]);
    //     $aficion_error = R::findOne('aficion', 'nombre=? and id<>?', [$nombre_nuevo, $id]);
    //     $ok = ($bean != null && $aficion_error == null);

    //     if ($ok) {
    //         $aficion = R::load('aficion', $id);
    //         $aficion->nombre = $nombre_nuevo;
    //         R::store($aficion);
    //     }
    //     return $ok;
    // }

    // public function delete($id)
    // {
    //     $aficion = R::load('aficion', $id);
    //     R::trash($aficion);
    // }
}
