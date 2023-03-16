<?php

namespace App\Models;
use App\Connection;

class Service{

    public function getAllService(){
        $conn = Connection::getDb();
        $query = 'SELECT id, name, duration, price FROM service';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }

    public function getService(int $id){
        $conn = Connection::getDb();
        $query = "SELECT id, name, duration, price FROM service WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }

    public function postService($data){
        $conn = Connection::getDb();
        $query = '
        INSERT INTO service (name, duration, price) 
        VALUES (:name, :duration, :price)
        ';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':duration', $data['duration']);
        $stmt->bindValue(':price', $data['price']);
        
        $result = $stmt->execute() ? 'Serviço cadastrado com sucesso!' : 'Falha no cadastro!';
        return $result;
    }
    
}