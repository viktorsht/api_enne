<?php

namespace App\Models;
use App\Connection;

class Contato{

    public function getContato(){
        $conn = Connection::getDb();
        $query = 'SELECT email, phone FROM website';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum domínio encontrado!");

        return $result;
    }
    public function updateContato($data){
        $conn = Connection::getDb();

        $query = 'UPDATE website SET email=:email,phone=:phone WHERE id=1';
        $stmt = $conn->prepare($query);
        //$stmt->bindValue(':id',1);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':phone', $data['phone']);
        $stmt->execute();

        $result = $stmt->execute() ? 'Atualização de contato realizada com sucesso!' : 'Falha na atualização!';
        return $result;

        
    }
}