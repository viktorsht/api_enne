<?php

namespace App\Services;

use App\Connection\Connection;
use App\Models\DeleteService;

class DeleteServiceService
{

    public function post(){
        $data = $_POST;
        return DeleteService::deleteService($data);
    }
}