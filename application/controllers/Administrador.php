<?php

class Administrador extends CI_Controller
{

    // ********************************************************
    // *                                                      *
    // *                        INDEX                         *
    // *                                                      *
    // ********************************************************

    public function index()
    {
        $this->home();
    }

    // ********************************************************
    // *                                                      *
    // *                         HOME                         *
    // *                                                      *
    // ********************************************************

    public function home()
    {
        //echo $this->session->tipoUsuario;

        // $this->session->loginAdmin = true;
        // $this->session->loginUser = false;

        //el administrador se ha logeado previamente
        if ($this->session->loginAdmin == true) {
            //carga de datos necesarios para el dashboard del administrador
            $data = [];

            $this->load->model('user_model');
            $users = $this->user_model->listAll();

            $this->load->model('monitor_model');
            $monitores = $this->monitor_model->listar();

            $this->load->model('actividad_model');
            $actividades = $this->actividad_model->listar();

            $this->load->model('aula_model');
            $aulas = $this->aula_model->listar();

            $this->load->model('administrador_model');
            $administradores = $this->administrador_model->listar();

            $data['users'] = $users;
            $data['monitores'] = $monitores;
            $data['actividades'] = $actividades;
            $data['aulas'] = $aulas;
            $data['administradores'] = $administradores;

            frameAdmin($this, 'administrador/dashboard', $data);
        } else {
            redirect(base_url() . 'administrador/login');
        }

    }

    // ********************************************************
    // *                                                      *
    // *                    CREACION USUARIO                  *
    // *                                                      *
    // ********************************************************

    public function crear()
    {
        frameAdmin($this, 'administrador/crear');
    }

    public function crearPost()
    {
        $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;
        $pw = isset($_POST['pw']) && !empty($_POST['pw']) ? $_POST['pw'] : null;

        $pw = md5($pw);

        if ($usuario != null) {
            $this->load->model('administrador_model');
            $ok = $this->administrador_model->crear($usuario, $pw);
            if ($ok) {
                echo 1;
            }
        }
    }

    // ********************************************************
    // *                                                        *
    // *                        LOGIN                         *
    // *                                                      *
    // ********************************************************

    public function login()
    {
        if (!isset($this->session->loginAdmin) || ($this->session->loginAdmin == false) || ($this->session->loginUser == true) || (isset($this->session->loginUser))) {
            $this->load->view('administrador/login');
        } else {
            redirect(base_url() . 'administrador/dashboard');
        }
    }

    public function loginPost()
    {
        $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;
        $pw = isset($_POST['pw']) && !empty($_POST['pw']) ? $_POST['pw'] : null;

        $pw = md5($pw);
        if (($usuario != null) && ($pw != null)) {

            $this->load->model('administrador_model');
            $ok = $this->administrador_model->getUserPassword($usuario, $pw);

            if ($ok) {
                //Login correcto
                $data['usuario'] = $usuario;
                $this->session->usuario = $usuario;
                $this->session->loginUser = false;
                $this->session->loginAdmin = true;
                echo 1;
            }

        } else {
            redirect(base_url() . 'administrador/login');
        }
        // } else {
        //     echo 3;
        //     // echo "<p>Rellene todos los campos</p>";
        // }
    }

    // ********************************************************
    // *                                                      *
    // *                        LOGOUT                         * 
    // *                                                      *
    // ********************************************************

    public function logout()
    {
        if ($this->session->loginAdmin == true) {

            $this->session->sess_destroy();
            redirect(base_url() . 'administrador/login');
        } else {
            show_404();
        }
    }

    // ********************************************************
    // *                                                      *
    // *                LISTAR ADMINISTRADORES                *
    // *                                                      *
    // ********************************************************

    public function  listar()
    {
        if ($this->session->loginAdmin == true) {
            $this->load->model('administrador_model');
            $administradores = $this->administrador_model->listar();
            $data = [];
            $data['administradores'] = $administradores;
            frameAdmin($this, 'administrador/listar', $data);
        } else {
            redirect(base_url() . 'administrador/login');
        }
    }


    // ********************************************************
    // *                                                      *
    // *                SUBIDA ARCHIVOS                       *
    // *                                                      *
    // ********************************************************

    public function subidaArchivos()
    {
        $this->load->view('administrador/subirArchivo');
    }
    public function subidaArchivosPost()
    {

        // Upload and Rename File

        if (isset($_POST['submit'])) {
            $filename = $_FILES["fileToUpload"];
            $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
            $file_ext = substr($filename, strripos($filename, '.')); // get file name
            $filesize = $_FILES["fileToUpload"]["size"];
            $allowed_file_types = array('.jpg', '.docx', '.rtf', '.pdf');

            if (in_array($file_ext, $allowed_file_types) && ($filesize < 200000)) {


                if (file_exists("upload/" . $file_ext)) {
                    // file already exists error
                    echo "You have already uploaded this file.";
                } else {
                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "assets/img/actividades/" . $file_ext);
                    echo "File uploaded successfully.";
                }
            } elseif (empty($file_basename)) {
                // file selection error
                echo "Please select a file to upload.";
            } elseif ($filesize > 200000) {
                // file size error
                echo "The file you are trying to upload is too large.";
            } else {
                // file type error
                echo "Only these file typs are allowed for upload: " . implode(', ', $allowed_file_types);
                unlink($_FILES["fileToUpload"]["tmp_name"]);
            }
        }



        // // Allow certain file formats
        // if (
        //     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        //     && $imageFileType != "gif"
        // ) {
        //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //     $uploadOk = 0;
        // }
    }

    public function editarPerfil()
    {
        frameAdmin($this, 'user/perfil');
    }


    public function getInfoJsonById()
    {
        $admin_id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

        $this->load->model('administrador_model');
        $administrador = $this->administrador_model->getAdministradorById($admin_id);


        if ($admin_id != null) {
            $data['status'] = 'ok';
            $data["administrador"] = $administrador;
        } else {
            $data['status'] = 'error';
        }

        echo json_encode($data);
        exit();
    }


    public function updatePost()
    {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;



        //$password = md5($password);

        if ($id != null && $usuario != null) {
            $this->load->model('administrador_model');
            $ok = $this->administrador_model->update($id,$usuario);

            if ($ok) {
                echo 1;
            }
        } else {
            echo 0;
        }
    }

    public function delete()
    {
        $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        if ($id != null) {
            $this->load->model('administrador_model');
            $ok =  $this->administrador_model->delete($id);
        }

        if ($ok) {
            echo 1;
        }
    }
}
