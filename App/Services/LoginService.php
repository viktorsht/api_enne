<?php

namespace App\Services;
#use App\Models\User;
use App\Connection\Connection;
use App\Models\User;



class LoginService
{
    public function get(){

    }

    public function post(){
        $data = $_POST;

        User::login($data);


    }
    public function update(){
        
    }
    public function delete(){
        
    }
}