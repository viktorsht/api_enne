<?php

namespace App\Services;
#use App\Models\User;
use App\Connection\Connection;
use App\Models\RegisterUser;



class RegisterUserService
{

    public function post(){
        $data = $_POST;

        return RegisterUser::insert($data);
    }
    public function update(){
        $data = $_POST;

        return RegisterUser::updateUser($data);
    }
    public function delete(){
        
    }
}