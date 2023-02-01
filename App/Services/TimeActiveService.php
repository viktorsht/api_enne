<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\TimeActive;

class TimeActiveService
{
    public function get(){
        //var_dump($_GET);

        $employee = isset($_GET['employee']) ? intval($_GET['employee']) : 2;
        $city = isset($_GET['city']) ? intval($_GET['city']) : 1;
        $day = isset($_GET['day']) ? intval($_GET['day']) : 0; // obrigado a passar o dia
        //echo($employee.$city);
        $result = TimeActive::getTimeActive($employee, $city, $day);

        return $result;
    }
}