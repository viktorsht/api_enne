<?php

namespace App\Models;
use App\Connection;

class User{

    public function getUser(int $id){
        $conn = Connection::getDb();

        $query = "SELECT name,surname,email,cpf,password FROM user WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
        
    }

    public static function getAllUser() {
        $conn = Connection::getDb();

        $query = 'SELECT name, email FROM user';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");
        return $result;
    }
}
