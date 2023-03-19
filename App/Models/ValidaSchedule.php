<?php

namespace App\Models;
use App\Connection;

class ValidaSchedule{
    public function validaSchedule($data){
        $conn = Connection::getDb();

        $query = 'SELECT id  FROM scheduling WHERE start = :start';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':start', $data['start']);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Agendamento inexistente!");
        
        return $result;
    }
}