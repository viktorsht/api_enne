<?php

namespace App\Models;
use App\Connection;

class DeleteService{

    public function deleteService($data){

        $conn = Connection::getDb();
        $query = 'DELETE FROM service WHERE id=:id /*AND name=:name*/';
        $stmt = $conn->prepare($query);
        //$stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':id', 5);
        //$stmt->bindValue(':name', $data['name']);
        
        $result = $stmt->execute() ? 'Remoção de serviço realizado com sucesso!' : 'Falha na remoção!';
        return $result;
    }

}