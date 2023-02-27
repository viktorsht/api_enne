<?php

namespace App\Models;
use App\Connection;

class Price{

    public function getPrice(int $id){
        $conn = Connection::getDb();

        $query = "SELECT price FROM service WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum preço encontrado!");

        return $result;
        
    }
}
