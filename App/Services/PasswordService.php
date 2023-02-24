<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Password;

class PasswordService
{
    public function get($id){
        return Password::getPasswordUser($id);
    }

    public function post(){
        $data = $_POST;

        return Password::updatePassword($data);
    }
}