<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\ServiceActive;

class ServiceActiveService
{
    public function get(){

        $employee = isset($_GET['employee']) ? intval($_GET['employee']) : 2;
        $city = isset($_GET['city']) ? intval($_GET['city']) : 1;
        $day = isset($_GET['day']) ? intval($_GET['day']) : 0; // obrigado a passar o dia
        #echo($employee. $city. $day);
        $result = ServiceActive::getServiceActive($employee, $city, $day);

        return $result;
    }
}