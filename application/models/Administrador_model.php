<?php

class Administrador_model extends CI_Model
{

    public function crear($usuario, $password)
    {
        $ok = false;

        $bean = R::findOne('administrador', 'usuario=?', [$usuario]);
        $ok = ($bean == null);

        if ($ok) {
            $administrador = R::dispense('administrador');
            $administrador->usuario = $usuario;
            $administrador->password = $password;

            R::store($administrador);
        }
        return $ok;
    }

    public function getUserPassword($usuario, $password)
    {
        $ok = false;

        $bean = R::findOne('administrador', 'usuario=? AND password=?', [$usuario, $password]);
        $ok = ($bean != null);

        return $ok;
    }

    public function listar()
    {
        return R::findAll('administrador');
    }

    public function getAdministradorById($admin_id)
    {
        return R::findOne('administrador', 'id=?', [$admin_id]);
    }

    public function update($id, $usuario){

        $administrador = R::load('administrador',$id);
        $administrador->usuario = $usuario;

        R::store($administrador);
        return true;
    }

    public function delete($id)
    {
        $ok = false;
        //Comprobamos que exista el usuario a borrar
        $bean = R::findOne('administrador', 'id=?', [$id]);

        //borrado
        if ($bean != null) {
            $administrador = R::load('administrador', $id);
            R::trash($administrador);
            $ok = true;
        }
        return $ok;
    }

}
