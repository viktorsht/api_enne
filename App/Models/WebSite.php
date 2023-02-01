<?php

namespace App\Models;
use App\Connection;

class WebSite{

    public function getWebSite(){
        $conn = Connection::getDb();
        $query = 'SELECT id,name,description, email, phone, created FROM website';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }
}