<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\DayActive;



class DayActiveService
{
    public function get(){
        //var_dump($_GET);

        $employee = isset($_GET['employee']) ? intval($_GET['employee']) : 2;
        $city = isset($_GET['city']) ? intval($_GET['city']) : 1;
        //echo($employee.$city);
        $result = DayActive::getDayActive($employee, $city);

        return $result;
    }
}