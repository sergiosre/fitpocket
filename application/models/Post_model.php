<?php

class Post_model extends CI_Model
{
    public function crear($user_id,$texto)
    {
        $post = R::dispense('post');
        $post->texto = $texto;
        $post->horaPublicacion = date("m-d-Y\TH:i");
        $post->publicado_por = R::findOne('user', $user_id);
        R::store($post);
    
        return true;
    }

    function listarPosts(){
        return R::findAll('post');
    }
}
