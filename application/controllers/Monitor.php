<?php

class Monitor extends CI_Controller
{

    public function crear()
    {
        frame($this, 'monitor/crear');
    }

    public function crearPost()
    {
        // $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;
        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : null;
        // $apellidos = isset($_POST['apellidos']) && !empty($_POST['apellidos']) ? $_POST['apellidos'] : null;
        // $pw = isset($_POST['pw']) && !empty($_POST['pw']) ? $_POST['pw'] : null;
        // $email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;
        // $telefono = isset($_POST['telefono']) && !empty($_POST['telefono']) ? $_POST['telefono'] : null;
        // $fotografia = isset($_POST['fotografia']) && !empty($_POST['fotografia']) ? $_POST['fotografia'] : null;

        // $pw = md5($pw);

        if ($nombre != null) {
            $this->load->model('monitor_model');
            $ok = $this->monitor_model->crear($nombre);
            if ($ok) {
                echo 1;
            }
        }
    }

    public function login()
    {
        frame($this, 'monitor/login');
    }

    public function loginPost()
    {
        $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;
        $pw = isset($_POST['pw']) && !empty($_POST['pw']) ? $_POST['pw'] : null;

        $pw = md5($pw);

        $this->load->model('monitor_model');
        $ok = $this->monitor_model->getUserPassword($usuario, $pw);

        if ($ok) {
            echo 1;
        }
    }

    public function listar()
    {
        $this->load->model('monitor_model');
        $data['monitores'] = $this->monitor_model->listar();
        frame($this, 'monitor/listar', $data);
    }

    public function updatePost()
    {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellidos = isset($_POST['apellidos']) && !empty($_POST['apellidos']) ? $_POST['apellidos'] : null;
        $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;
        $email = isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null;

        //$password = md5($password);

        if ($id != null && $email != null && $nombre != null && $apellidos != null && $usuario != null) {
            $this->load->model('monitor_model');
            $ok = $this->monitor_model->update($id, $email, $nombre, $apellidos, $usuario);

            if ($ok) {
                echo 1;
            }
        } else {
            echo 0;
        }
    }

    public function getInfoJsonById()
    {
        $monitor_id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

        $this->load->model('monitor_model');
        $monitor = $this->monitor_model->getMonitorById($monitor_id);

        if ($monitor_id != null) {
            $data['status'] = 'ok';
            $data["monitor"] = $monitor;
        } else {
            $data['status'] = 'error';
        }

        echo json_encode($data);
        exit();
    }

    // public function updatePost()
    // {
    //     $nombre_nuevo = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : null;
    //     $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

    //     if ($id != null && $nombre_nuevo != null) {
    //         $this->load->model('aficion_model');
    //         $ok = $this->aficion_model->update($id, $nombre_nuevo);
    //         if ($ok) {
    //             redirect(base_url() . 'aficion/listar');
    //         } else {
    //             frame($this, 'aficion/updateERROR');
    //         }
    //     } else {
    //         // Mensaje ERROR
    //     }
    // }

    public function delete()
    {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('aficion_model');
            $this->aficion_model->delete($id);
            echo 1;
        }
    }
}
