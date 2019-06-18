<?php

class Actividad extends CI_Controller
{

    public function crear()
    {
        frame($this, 'actividad/crear');
    }

    public function crearPost()
    {
        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $info = isset($_POST['info']) && !empty($_POST['info']) ? $_POST['info'] : null;
        $impacto = isset($_POST['impacto']) && !empty($_POST['impacto']) ? $_POST['impacto'] : null;


        /*****  subida de imagen    ******/

        //comprueba si existe la imagen, si no la pone por defecto
        if (isset($_FILES['fileToUpload'])) {

            //Se ha enviado el formulario sin imagen
            if ($_FILES['fileToUpload']['name'] == "") {
                $img = "none";

                //si que hay imagen    
            } else {

                //ruta a la que se va a subir la imagen
                $uploadDirectory = "assets/img/actividades/";
                $errors = []; // Store all foreseen and unforseen errors here
                $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
                $fileName = $_FILES['fileToUpload']['name'];
                $fileSize = $_FILES['fileToUpload']['size'];
                $fileTmpName  = $_FILES['fileToUpload']['tmp_name'];
                $fileType = $_FILES['fileToUpload']['type'];
                $fileExtension = explode('.', $fileName);


                //ruta a la que se va a subir el archivo 
                $uploadPath = $uploadDirectory . basename($fileName);

                if (!in_array($fileExtension[1], $fileExtensions)) {
                    $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
                }

                if ($fileSize > 10000000) {
                    $errors[] = "This file is more than 10MB. Sorry, it has to be less than or equal to 10MB";
                }

                if (empty($errors)) {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

                    if ($didUpload) {
                        echo "The file " . basename($fileName) . " has been uploaded";
                    } else {
                        echo "An error occurred somewhere. Try again or contact the admin";
                    }
                } else {
                    foreach ($errors as $error) {
                        echo $error . "These are the errors" . "\n";
                    }
                }
                $img = $uploadPath;
            }
        } else {
            echo "ERROR";
        }


        //llamando al modelo para crear la actvidad
        if (($nombre != null) && ($info != null) && ($impacto != null)) {

            $this->load->model('actividad_model');
            $ok = $this->actividad_model->crear($nombre, $info, $impacto, $img);
            if ($ok) {
                echo 1;
            }
        }
    }


    public function comprobarActividad()
    {
        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $info = isset($_POST['info']) && !empty($_POST['info']) ? $_POST['info'] : null;
        $impacto = isset($_POST['impacto']) && !empty($_POST['impacto']) ? $_POST['impacto'] : null;

        $this->load->model('actividad_model');
        $ok = $this->actividad_model->buscarActividadByNombre($nombre);

        if ($ok) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function listar()
    {
        $this->load->model('actividad_model');
        $actividades = $this->actividad_model->listar();
        $data = [];
        $data['actividades'] = $actividades;
        frame($this, 'actividad/listar', $data);
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

    public function updatePost()
    {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        $nombre = isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $info = isset($_POST['info']) && !empty($_POST['info']) ? $_POST['info'] : null;
        $impacto = isset($_POST['impacto']) && !empty($_POST['impacto']) ? $_POST['impacto'] : null;


        if ($id != null && $nombre != null && $info != null && $impacto != null) {
            $this->load->model('actividad_model');
            $ok = $this->actividad_model->update($id, $nombre, $info, $impacto);

            if ($ok) {
                echo 1;
            }
        } else {
            echo 0;
        }
    }


    public function getInfoJsonById()
    {
        $actividad_id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

        $this->load->model('actividad_model');
        $user = $this->actividad_model->getActividadById($actividad_id);


        if ($actividad_id != null) {
            $data['status'] = 'ok';
            $data["actividad"] = $user;
        } else {
            $data['status'] = 'error';
        }

        echo json_encode($data);
        exit();
    }

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
