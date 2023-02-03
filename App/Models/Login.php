<?php

namespace App\Models;
use App\Connection;

class Login{
    public function login($data){
        $conn = Connection::getDb();

        $query = 'SELECT id, name, surname  FROM user WHERE email = :email AND password = :password';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':password', md5($data['password']) );
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Usuário não existe!");
        
        return $result;

        
    }
}