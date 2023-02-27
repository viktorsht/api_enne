<?php

namespace App\Models;
use App\Connection;

class UpdateService{

    public function updateService($data){

        $conn = Connection::getDb();
        $query = 'UPDATE service SET name=:name,duration=:duration, price=:price
        WHERE id=:id';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':duration', $data['duration']);
        $stmt->bindValue(':price', $data['price']);
        
        $result = $stmt->execute() ? 'Atualização de serviço realizada com sucesso!' : 'Falha no cadastro!';
        return $result;
    }

}