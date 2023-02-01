<?php

namespace App\Models;
use App\Connection;

class Holiday{

    public function getHoliday(){
        $conn = Connection::getDb();
        $query = 'SELECT id,name,date,permanent,fk_employee AS employee, fk_city AS city FROM holiday';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }
}