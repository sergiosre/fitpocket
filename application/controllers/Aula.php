<?php

class Aula extends CI_Controller
{

    public function crear()
    {
        frame($this, 'aula/crear');
    }

    public function crearPost()
    {
        $aula = isset($_POST['aula']) && !empty($_POST['aula']) ? $_POST['aula'] : null;

        if ($aula != null) {
            $this->load->model('aula_model');
            $ok = $this->aula_model->crear($aula);
            if ($ok) {
                echo 1;
            }
        }
    }


    public function listar()
    {
        $this->load->model('aula_model');
        $aulas = $this->aula_model->listar();
        $data = [];
        $data['aulas'] = $aulas;
        frame($this, 'aula/listar', $data);
    }

    public function delete()
    {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('aula_model');
            $ok =  $this->aula_model->delete($id);
        }

        if ($ok) {
            echo 1;
        }
    }


    // public function update()
    // {
    //     $id = (isset($_POST['id']) && !empty($_POST['id'])) ? $_POST['id'] : null;
    //     if ($id != null) {
    //         $this->load->model('aficion_model');
    //         $aficion = $this->aficion_model->getAficionById($id);
    //         $data = [];
    //         $data['aficion'] = $aficion;
    //         frame($this, 'aficion/update', $data);
    //     } else {
    //         redirect(base_url());
    //     }
    // }

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

    // public function delete()
    // {
    //     $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
    //     if ($id != null) {
    //         $this->load->model('aficion_model');
    //         $this->aficion_model->delete($id);
    //         redirect(base_url() . 'aficion/listar');
    //     }
    // }
}
