<?php

namespace App\Models;
use App\Connection;

class Time{

    public function getTime(){
        $conn = Connection::getDb();
        $query = 'SELECT id,time FROM time';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }
}