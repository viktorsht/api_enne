<?php

namespace App\Services;
#use App\Models\User;
use App\Connection\Connection;
use App\Models\Login;



class LoginService
{
    public function get(){

    }

    public function post(){
        $data = $_POST;

        return Login::login($data);

    }
    public function update(){
        
    }
    public function delete(){
        
    }
}