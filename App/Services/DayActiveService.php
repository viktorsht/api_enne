<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\DayActive;



class DayActiveService
{
    public function get(){

        $result = DayActive::getDayActive();

        return $result;
    }
    public function post(){
        $data = $_POST;
        return DayActive::postDayActive($data);
    }
}