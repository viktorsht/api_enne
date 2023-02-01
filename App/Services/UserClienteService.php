<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\UserCliente;



class UserClienteService
{
    public function get($fk_level){

        $result = UserCliente :: getUserCliente($fk_level);

        return $result;
    }
}