<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\ValidaSchedule;



class ValidaScheduleService
{
    public function post(){
        $data = $_POST;

        return ValidaSchedule::validaSchedule($data);

    }
}