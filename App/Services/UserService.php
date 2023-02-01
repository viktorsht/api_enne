<?php

namespace App\Services;
#use App\Models\User;
use App\Connection\Connection;
use App\Models\User;



class UserService
{
    public function get($id=null){

        $result = $id == null ? User::getAll()  : User::getUser($id);

        return $result;
    }

    public function login(){
        echo "login";
    }

    public function post(){
        $data = $_POST;

        return User::insert($data);
    }
    public function update(){
        
    }
    public function delete(){
        
    }
}