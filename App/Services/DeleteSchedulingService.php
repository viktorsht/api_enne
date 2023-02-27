<?php

namespace App\Services;

use App\Connection\Connection;
use App\Models\DeleteScheduling;

class DeleteSchedulingService
{

    public function post(){
        $data = $_POST;
        return DeleteScheduling::deleteScheduling($data);
    }
}