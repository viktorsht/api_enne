<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Day;



class DayService
{
    public function get(){

        $result = Day::getDay();

        return $result;
    }
}