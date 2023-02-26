<?php

namespace App\Services;
use App\Connection\Connection;
use App\Models\Contato;

class ContatoService
{
    public function get(){
        return Contato::getContato();
        //return $result;
    }
    
    public function post(){
        $data = $_POST;
        return Contato::updateContato($data);
    }
}