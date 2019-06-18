<?php

class User_model extends CI_Model
{
    //Falta meter la foto
    public function create($nombre, $apellidos, $email, $password, $usuario)
    {
        $ok = false;
        $beanEmail = false;
        $beanUsuario = false;

        $beanEmail = R::findOne('user', 'email=?', [$email]);
        $beanUsuario = R::findOne('user', 'usuario=?', [$usuario]);

        $okusuario = ($beanUsuario == null);
        $okemail = ($beanEmail == null);

        if ($okusuario && $okemail) {
            $user = R::dispense('user');
            $user->nombre = $nombre;
            $user->apellidos = $apellidos;
            $user->movil = null;
            $user->email = $email;
            $user->usuario = $usuario;
            $user->password = $password;
            $user->edad = null;
            $user->estatura = null;
            $user->peso = null;
            $user->activo = 0;
            // $user->img = "";
            $ok = true;
            R::store($user);
        }
        return $ok;
    }



    public function getUserPassword($email, $password)
    {
        $ok = false;

        $user = R::findOne('user', 'email=? AND password=?', [$email, $password]);
        $ok = ($user != null);

        if($user->activo == 0){
            $ok = false;
        }

        return $ok;
    }

    public function listar($id)
    {
        $ok = false;

        $bean = R::findOne('user', 'id=?', [$id]);
        $user_error = R::findOne('user', 'id=? and password');
        $ok = ($bean != null & $user_error == null);
    }

    public function listAll()
    {
        return R::findAll('user');
    }

    public function delete($id)
    {
        $ok = false;
        //Comprobamos que exista el usuario a borrar
        $bean = R::findOne('user', 'id=?', [$id]);

        //borrado
        if ($bean != null) {
            $user = R::load('user', $id);
            R::trash($user);
            $ok = true;
        }
        return $ok;
    }

    public function getUserByEmail($correo)
    {
        $user = R::findOne('user', 'email=?', [$correo]);
        return $user;
    }

    public function getUserIdByEmail($correo)
    {

        $user = R::findOne('user', 'email=?', [$correo]);
        $user_id = $user->id;
        return $user_id;
    }

    public function crearReserva($usuario_id, $sesion_id, $fechaReserva)
    {
        $ok = false;
        //Variables para comprobar que no exista la reserva, que existe el usuario que hace la reserva y que existe la sesion que se reserva. 
        $okUser = false;
        $okSesion = false;
        $okReserva = false;


        //comprobando que no existe la reserva antes de hacerla. 
        $reservaYaCreada = R::getAll(
            'select * from reserva where user_id = :user_id and sesion_id = :sesion_id and fecha_reserva = :fecha_reserva',
            array(
                ':user_id' => $usuario_id,
                ':sesion_id' => $sesion_id,
                ':fecha_reserva' => $fechaReserva
            )
        );


        //si no encuentra una reserva, lo pone a true
        $okReserva = ($reservaYaCreada == null);
        // $okReserva = true;

        //recuperando el usuario
        $user = R::findOne('user', 'id=?', [$usuario_id]);
        $okUser = ($user != null);

        //recuperando la sesion
        $sesion = R::findOne('sesion', 'id=?', [$sesion_id]);
        $okSesion = ($sesion != null);

        if ($okSesion && $okUser && $okReserva) {

            $reserva = R::dispense('reserva');
            $reserva->user = $user;
            $reserva->sesion = $sesion;
            $reserva->estado = "1";

            $date = new DateTime($fechaReserva);
            $reserva->fechaReserva = $date;

            R::store($reserva);

            $ok = true;
        }

        return $ok;
    }

    public function listarReservaByUserId($user_id)
    {
        return R::findAll('reserva', ' user_id=? ', [$user_id]);
    }

    public function listarReservaProximaByUserId($user_id)
    {
        return R::findAll('reserva', ' user_id=? and fecha_reserva > NOW()', [$user_id]);
    }

    public function listarHistoricoReservasByUserId($user_id)
    {
        return R::findAll('historico_reservas', ' user_id=? ', [$user_id]);
    }

    /**
     * Cancela la reserva cambiando el estado de activa a cancelada
     */
    public function cancelarReserva($reserva_id)
    {
        //comprobacion de que existe la reserva
        $reserva = R::load('reserva', $reserva_id);
        $reserva->estado = 0;
        R::store($reserva);
        return true;
    }


    public function reactivarReserva($reserva_id)
    {
        //comprobacion de que existe la reserva
        $reserva = R::load('reserva', $reserva_id);
        $reserva->estado = 1;
        R::store($reserva);

        return true;
    }

    public function getUserById($user_id)
    {
        return R::findOne('user', 'id=?', [$user_id]);
    }

    public function update($id, $email, $nombre,$apellidos,$usuario){

        $user = R::load('user',$id);
        $user->email = $email;
        $user->nombre = $nombre;
        $user->apellidos = $apellidos;
        $user->usuario = $usuario;

        R::store($user);
        return true;
    }

    public function activarDesactivarUser($id){
        
        $user = R::load('user', $id);

        if ($user->activo == 1) {
            $user->activo = 0;
        }
        else{
            $user->activo = 1;  
        }
        R::store($user);
        return true;
    }

    public function updateImgPerfil($id,$img){

        $user = R::load('user',$id);
        $user->img = $img;
        R::store($user);
        return true;
    }
}
