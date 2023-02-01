<?php

namespace App\Models;
use App\Connection;

class Service{

    public function getService(){
        $conn = Connection::getDb();
        $query = 'SELECT id, name, duration FROM service';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        //echo "oi";
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }
}