<?php

namespace App\Services;

use App\Connection\Connection;
use App\Models\UpdateUser;

class UpdateUserService
{

    public function post(){
        $data = $_POST;

        return UpdateUser::updateUser($data);
    }
    public function update(){
        
    }
    public function delete(){
        
    }
}