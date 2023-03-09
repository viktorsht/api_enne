<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Scheduling;

class SchedulingService
{
    public function get($id=null){
        //$employee = isset($_GET['employee']) ? intval($_GET['employee']) : 2;
        #$city = isset($_GET['city']) ? intval($_GET['city']) : 1;
        #$day = isset($_GET['day']) ? intval($_GET['day']) : 0; // obrigado a passar o dia
        //$result = Scheduling::getAllScheduling($employee);
        $result = $id == null ? Scheduling::getAllScheduling() : Scheduling::getScheduling($id);

        return $result;
    }
    public function post(){
        $data = $_POST;
        return Scheduling::postScheduling($data);
    }
}