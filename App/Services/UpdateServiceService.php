<?php

namespace App\Services;

use App\Connection\Connection;
use App\Models\UpdateService;

class UpdateServiceService
{

    public function post(){
        $data = $_POST;
        return UpdateService::updateService($data);
    }
}