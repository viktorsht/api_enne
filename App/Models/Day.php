<?php

namespace App\Models;
use App\Connection;

class Day{

    public function getDay(){
        $conn = Connection::getDb();
        $query = 'SELECT id,name,initials FROM day';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }

}