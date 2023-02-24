<?php

namespace App\Models;
use App\Connection;

class Password{

    public function getPasswordUser(int $id){
        $conn = Connection::getDb();

        $query = "SELECT password FROM user WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
        
    }
    public function updatePassword($data){
        $conn = Connection::getDb();

        $query = 'UPDATE user SET password=:password WHERE id=:id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':password', md5($data['password']) );
        $stmt->execute();
        
        $result = $stmt->execute() ? 'Cadastro realizado com sucesso!' : 'Falha no cadastro!';
        return $result;

        
    }
}
