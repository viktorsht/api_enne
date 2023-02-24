<?php

namespace App\Services;

use App\Connection\Connection;
use App\Models\UpdateScheduling;

class UpdateSchedulingService
{

    public function post(){
        $data = $_POST;
        return UpdateScheduling::updateScheduling($data);
    }
}