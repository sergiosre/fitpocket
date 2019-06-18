<?php

class Sesion extends CI_Controller
{
    public function crear()
    {
        frameAdmin($this, 'sesion/crear');
    }

    public function crearPost()
    {
        //almacena la sesion y redirige al horario

        $actividad = isset($_POST['actividad']) && !empty($_POST['actividad']) ? $_POST['actividad'] : null;
        $monitor = isset($_POST['monitor']) && !empty($_POST['monitor']) ? $_POST['monitor'] : null;
        $aulaId = isset($_POST['aula']) && !empty($_POST['aula']) ? $_POST['aula'] : null;
        $dia = isset($_POST['dia']) && !empty($_POST['dia']) ? $_POST['dia'] : null;
        $horaInicio = isset($_POST['horaInicio']) && !empty($_POST['horaInicio']) ? $_POST['horaInicio'] : null;
        $horaFin = isset($_POST['horaFin']) && !empty($_POST['horaFin']) ? $_POST['horaFin'] : null;

        $this->load->model('aula_model');
        $aula = $this->aula_model->getAulaById($aulaId);

        $this->load->model('sesion_model');

        $ok = $this->sesion_model->crear($actividad, $monitor, $aulaId, $dia, $horaInicio, $horaFin); //hay que meter que devuelva un booleano el método para comprobar que se ha generado correctamente $ok = $this...
        if ($ok) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function login()
    {
        frame($this, 'administrador/login');
    }

    public function loginPost()
    {
        $usuario = isset($_POST['usuario']) && !empty($_POST['usuario']) ? $_POST['usuario'] : null;
        $pw = isset($_POST['pw']) && !empty($_POST['pw']) ? $_POST['pw'] : null;

        $pw = md5($pw);

        $this->load->model('administrador_model');
        $ok = $this->administrador_model->getUserPassword($usuario, $pw);

        if ($ok) {
            $data['usuario'] = $usuario;
            frame($this, 'administrador/loginOK', $data);
        } else {
            $data['usuario'] = $usuario;
            $data['pw'] = $pw;
            frame($this, 'administrador/loginERROR', $data);
        }
    }

    public function horario()
    {

        if ($this->session->loginAdmin == true && isset($_POST['prueba'])) {
      
        // Obtenemos los datos del aula
        // $aulaId = isset($_POST['id_aula']) && !empty($_POST['id_aula']) ? $_POST['id_aula'] : null;
        $aulaId = $_POST["prueba"];
        $this->load->model('aula_model');
        $aula = $this->aula_model->getAulaById($aulaId);

        //Obtenemos los datos de los monitores
        $this->load->model('monitor_model');
        $monitores = $this->monitor_model->listar();

        //Obtenemos los datos de los actividades
        $this->load->model('actividad_model');
        $actividades = $this->actividad_model->listar();

        //Obtenemos los datos de las sesiones ya creadas
        $this->load->model('sesion_model');
        $sesiones = $this->sesion_model->listar($aulaId);

        //carga de datos para la vista
        $data = [];
        $data['aula'] = $aula;
        $data['monitores'] = $monitores;
        $data['actividades'] = $actividades;
        $data['sesiones'] = $sesiones;
        frameAdmin($this, 'sesion/horario', $data);

    }else{
        show_404();
    }
    }

    public function comprobarHoras()
    {

        $actividad = isset($_POST['actividad']) && !empty($_POST['actividad']) ? $_POST['actividad'] : null;
        $monitor = isset($_POST['monitor']) && !empty($_POST['monitor']) ? $_POST['monitor'] : null;
        $aulaId = isset($_POST['aula']) && !empty($_POST['aula']) ? $_POST['aula'] : null;
        $dia = isset($_POST['dia']) && !empty($_POST['dia']) ? $_POST['dia'] : null;
        $horaInicio = isset($_POST['horaInicio']) && !empty($_POST['horaInicio']) ? $_POST['horaInicio'] : null;
        $horaFin = isset($_POST['horaFin']) && !empty($_POST['horaFin']) ? $_POST['horaFin'] : null;

        $ok = false;

        $this->load->model('sesion_model');
        $sesiones = $this->sesion_model->listarPorDia($aulaId, $dia);

        //comprueba si la nueva sesion entra en conflicto con alguna sesion ya creada, si lo encuentra sale del bucle
        foreach ($sesiones as $sesion) {
                   if  ((($horaInicio <= $sesion->hora_inicio) || ($horaInicio >= $sesion->hora_fin)) && ((($horaFin <= $sesion->hora_inicio) || ($horaFin >= $sesion->hora_fin))) && ($horaInicio < $horaFin)) {
                $ok = true;
            }else{
                $ok = false;
                break;
            }
        }

        //en caso de que no haya sesiones
        if(sizeof($sesiones == 0)){
            $ok = true;
        }


        // si saca 1 es true y por tanto que no se solapa con ninguna hora
        echo $ok;
    }
}
