<?php

namespace App\Models;
use App\Connection;

class Service{

    public function getAllService(){
        $conn = Connection::getDb();
        $query = 'SELECT id, name, duration FROM service';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }

    public function getService(int $id){
        $conn = Connection::getDb();
        $query = "SELECT id, name, duration FROM service WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }
}