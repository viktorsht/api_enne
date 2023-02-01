<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Service;

class ServiceService
{
    public function get(){

        $result = Service::getService();

        return $result;
    }
}