<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Holiday;

class HolidayService
{
    public function get(){

        $result = Holiday::getHoliday();

        return $result;
    }
    public function post(){
        $data = $_POST;

        return Holiday::postHoliday($data);
    }
}