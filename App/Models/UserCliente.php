<?php

namespace App\Models;
use App\Connection;

class UserCliente{

    public function getUserCliente(int $fk_level){
        $conn = Connection::getDb();

        $query = "SELECT id,name FROM user WHERE fk_level = :fk_level";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':fk_level', $fk_level);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
        
    }
}