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
    public function postHoliday($data){
        $conn = Connection::getDb();
        $query = 
        '
        INSERT INTO holiday (name, date, permanent, fk_employee, fk_city) 
        VALUES (:name, :date,:permanent, :fk_employee, :fk_city)
        '
        ;
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':date', $data['date']);
        $stmt->bindValue(':permanent', $data['permanent']);
        $stmt->bindValue(':fk_employee', 1);
        $stmt->bindValue(':fk_city', 1);
        $result = $stmt->execute() ? 'Feriado cadastrado com sucesso!' : 'Falha no cadastro do feriado!';
        return $result;
    }
}