<?php
class User extends CI_Controller
{

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        if (!isset($this->session->loginUser) || $this->session->loginUser == false) {
            redirect(base_url() . 'user/login');
        } else {
            if ($this->session->loginUser == true) {
                $this->load->model('post_model');
                $posts = $this->post_model->listarPosts();

                $data = [];
                $data['posts'] = $posts;
                frame($this, 'user/home', $data);
            }
        }
    }

    public function create()
    {
        $this->load->view('user/registro');
    }

    public function registerPost()
    {
        $email = isset($_POST['email_user_register_name']) && !empty($_POST['email_user_register_name']) ? $_POST['email_user_register_name'] : null;
        $pw = isset($_POST['password_user_register_name']) && !empty($_POST['password_user_register_name']) ? $_POST['password_user_register_name'] : null;

        $nombre = isset($_POST['nombre_name']) && !empty($_POST['nombre_name']) ? $_POST['nombre_name'] : null;

        $apellidos = isset($_POST['apellidos_name']) && !empty($_POST['apellidos_name']) ? $_POST['apellidos_name'] : null;

        $usuario = isset($_POST['usuario_name']) && !empty($_POST['usuario_name']) ? $_POST['usuario_name'] : null;

        $pw = md5($pw);

        if (($email != null) && ($pw != null) && ($usuario != null) && ($nombre != null) && ($apellidos != null)) {
            $this->load->model('user_model');
            $ok = $this->user_model->create($nombre, $apellidos, $email, $pw, $usuario);
            if ($ok) {
                echo 1;
            }
        }
    }

    // ********************************************************
    // *                                                      *
    // *                        LOGIN                         *
    // *                                                      *
    // ********************************************************

    public function login()
    {
        if (!isset($this->session->usuario)) {
            $this->load->view('user/login');
        } else {
            redirect(base_url() . 'user/home');
        }
    }

    public function loginPost()
    {
        $email = isset($_POST['email_user_login_name']) && !empty($_POST['email_user_login_name']) ? $_POST['email_user_login_name'] : null;
        $pw = isset($_POST['password_user_login_name']) && !empty($_POST['password_user_login_name']) ? $_POST['password_user_login_name'] : null;

        $pw = md5($pw);
        if (($email != null) && ($pw != null)) {
            if (!isset($this->session->usuario)) {
                $this->load->model('user_model');
                $ok = $this->user_model->getUserPassword($email, $pw);

                if ($ok) {
                    //Login correcto
                    $this->session->usuario = $email;

                    //mete el id usuario en una variable de sesión
                    $this->session->user_id = $this->user_model->getUserIdByEmail($email);
                    $this->session->loginUser = true;

                    echo 1;
                }
            } else {
                redirect(base_url() . 'user/login');
            }
        } else {
            echo 3;
            // echo "<p>Rellene todos los campos</p>";
        }
    }

    function list()
    {
        $this->load->model('user_model');
        $users = $this->user_model->list();
        $data = [];
        $data['users'] = $users;
        frame($this, 'user/list', $data);
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
            $this->load->model('user_model');
            $ok = $this->user_model->update($id, $email, $nombre, $apellidos, $usuario);

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
            $this->load->model('user_model');
            $ok =  $this->user_model->delete($id);
        }

        if ($ok) {
            echo 1;
        }
    }

    public function logout()
    {
        if ($this->session->loginUser == true) {

            $this->session->sess_destroy();
            redirect(base_url() . 'user/login');
        } else {
            show_404();
        }
    }

    public function crearReserva()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect(base_url() . 'user/login');
        } else {
            //Obtenemos los datos de las sesiones ya creadas
            $this->load->model('sesion_model');
            $sesiones = $this->sesion_model->listarTodas();

            //carga de datos para la vista
            $data = [];
            $data['sesiones'] = $sesiones;
            frame($this, 'user/actividades', $data);
        }
    }

    public function crearReservaPost()
    {

        //hay que controlar que el usuario no tenga ya una reserva para la misma actividad y misma fecha
        if (isset($_POST)) {
            $user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ? $_POST['user_id'] : 1;
            $sesion_id = isset($_POST['sesion_id']) && !empty($_POST['sesion_id']) ? $_POST['sesion_id'] : null;
            $fechaReserva = isset($_POST['fechaReserva']) && !empty($_POST['fechaReserva']) ? $_POST['fechaReserva'] : null;


            if ($user_id != null && $sesion_id != null && $fechaReserva != null) {

                $this->load->model('user_model');
                $ok =  $this->user_model->crearReserva($user_id, $sesion_id, $fechaReserva);

                if ($ok) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } else {
            echo "ACCESO DENEGADO";
        }
    }

    public function listarReserva()
    {

        if (!isset($_SESSION['user_id'])) {
            redirect(base_url() . 'user/login');
        } else {


            $user_id = $_SESSION['user_id'];
            $this->load->model('user_model');
            $reservasProximas = $this->user_model->listarReservaProximaByUserId($user_id);
            $reservasPasadas = $this->user_model->listarHistoricoReservasByUserId($user_id);

            $data = [];
            $data['reservasProximas'] = $reservasProximas;
            $data['reservasPasadas'] = $reservasPasadas;

            frame($this, 'user/listarReserva', $data);
        }
    }

    public function cancelarReservaPost()
    {

        $reserva_id = isset($_POST['reserva_id']) && !empty($_POST['reserva_id']) ? $_POST['reserva_id'] : null;

        $this->load->model('user_model');
        $ok = $this->user_model->cancelarReserva($reserva_id);

        if ($ok) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function reactivarReservaPost()
    {

        $reserva_id = isset($_POST['reserva_id']) && !empty($_POST['reserva_id']) ? $_POST['reserva_id'] : null;

        $this->load->model('user_model');
        $ok = $this->user_model->reactivarReserva($reserva_id);

        if ($ok) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function listarActividades()
    {

        if (!isset($_SESSION['user_id'])) {
            redirect(base_url() . 'user/login');
        } else {

            $this->load->model('actividad_model');
            $actividades = $this->actividad_model->listar();


            $data = [];
            $data['actividades'] = $actividades;

            frame($this, 'actividad/listar', $data);
        }
    }

    public function perfil()
    {

        frame($this, 'user/perfil');
    }

    public function getInfoJsonById()
    {
        $user_id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

        $this->load->model('user_model');
        $user = $this->user_model->getUserById($user_id);


        if ($user_id != null) {
            $data['status'] = 'ok';
            $data["user"] = $user;
        } else {
            $data['status'] = 'error';
        }

        echo json_encode($data);
        exit();
    }

    public function activarDesactivarUser()
    {
        $user_id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;

        $this->load->model('user_model');
        $ok = $this->user_model->activarDesactivarUser($user_id);

        if ($ok) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function updateImgPerfil()
    {

        $user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ? $_POST['user_id'] : null;
        /*****  subida de imagen    ******/

        //comprueba si existe la imagen, si no la pone por defecto
        if (isset($_FILES['imgInp'])) {

            //Se ha enviado el formulario sin imagen
            if ($_FILES['imgInp']['name'] == "") {
                $img = "none";

                //si que hay imagen    
            } else {

                //ruta a la que se va a subir la imagen
                $uploadDirectory = "assets/img/actividades/";
                $errors = []; // Store all foreseen and unforseen errors here
                $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
                $fileName = $_FILES['imgInp']['name'];
                $fileSize = $_FILES['imgInp']['size'];
                $fileTmpName  = $_FILES['imgInp']['tmp_name'];
                $fileType = $_FILES['imgInp']['type'];
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
                        // echo "The file " . basename($fileName) . " has been uploaded";
                    } else {
                        echo "An error occurred somewhere. Try again or contact the admin";
                    }
                } else {
                    foreach ($errors as $error) {
                        echo $error . "These are the errors" . "\n";
                    }
                }
                $img = $uploadPath;

                //llamando al modelo para actualizar la img de perfil
                $this->load->model('user_model');
                $ok = $this->user_model->updateImgPerfil($user_id, $img);
                echo 1;
            }
        } else {
            echo "ERROR";
        }
    }

    public function publicarTweet()
    {
        $user_id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
        $texto = isset($_POST['texto']) && !empty($_POST['texto']) ? $_POST['texto'] : null;

        $this->load->model('post_model');
        $ok = $this->post_model->crear($user_id, $texto);

        if ($ok) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
