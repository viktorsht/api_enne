<?php

namespace App\Services;
#use App\Models\User;
use App\Connection\Connection;
use App\Models\User;

class UserService
{
    public function get($id=null){

        $result = $id == null ? User::getAllUser()  : User::getUser($id);

        return $result;
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