<?php

class Aula_model extends CI_Model
{

    public function crear($numero)
    {
        $ok = false;

        $bean = R::findOne('aula', 'numero=?', [$numero]);
        $ok = ($bean == null);

        if ($ok) {
            $aula = R::dispense('aula');
            $aula->numero = $numero;

            R::store($aula);
        }
        return $ok;
    }


    public function listar()
    {
        return R::findAll('aula');
    }

    public function getAulaById($id)
    {
        return R::findOne('aula', 'id=?', [$id]);
    }

    public function delete($id)
    {
        $ok = false;
        //Comprobamos que exista el aula a borrar
        $bean = R::findOne('aula', 'id=?', [$id]);

        //borrado
        if ($bean != null) {
            $aula = R::load('aula', $id);
            R::trash($aula);
            $ok = true;
        }
        return $ok;
    }
}
