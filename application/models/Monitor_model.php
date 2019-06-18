<?php

class Monitor_model extends CI_Model
{

    public function crear($nombre)
    {

        $monitor = R::dispense('monitor');
        $monitor->nombre = $nombre;
        R::store($monitor);
        return true;
    }

    public function getUserPassword($usuario, $password)
    {
        $ok = false;

        $bean = R::findOne('monitor', 'usuario=? AND password=?', [$usuario, $password]);
        $ok = ($bean != null);

        return $ok;
    }

    public function listar()
    {
        return R::findAll('monitor');
    }

    public function getMonitorById($monitor_id)
    {
        return R::findOne('monitor', 'id=?', [$monitor_id]);
    }

    public function update($id, $email, $nombre, $apellidos, $usuario)
    {

        $monitor = R::load('monitor', $id);
        $monitor->email = $email;
        $monitor->nombre = $nombre;
        $monitor->apellidos = $apellidos;
        $monitor->usuario = $usuario;

        R::store($monitor);
        return true;
    }

    public function delete($id)
    {
        $monitor = R::load('monitor', $id);
        R::trash($monitor);
    }
}
