<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Service;

class ServiceService
{
    public function get(int $id=null){

        $result = $id == null ? Service::getAllService() : Service::getService($id);
        return $result;
    }
    public function post(){
        $data = $_POST;

        return Service::postService($data);
    }
}