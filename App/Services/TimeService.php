<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Time;



class TimeService
{
    public function get(){

        $result = Time::getTime();

        return $result;
    }
}