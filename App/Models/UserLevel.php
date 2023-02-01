<?php

namespace App\Models;
use App\Connection;

class UserLevel{

    public function getUserLevel(){
        $conn = Connection::getDb();

        $query = "SELECT id,name FROM user_level";
        $stmt = $conn->prepare($query);
        //$stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
        
    }
}