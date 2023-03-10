<?php

namespace App\Models;
use App\Connection;

class Scheduling{
    public function getAllScheduling(){
        $conn = Connection::getDb();
        /*
        $query = '
        SELECT * FROM scheduling AS s
        INNER JOIN user AS u ON (s.fk_client = u.id)
        WHERE s.fk_employee = 2
        ';
        */
        $query = 'SELECT s.id AS scheduling_id, s.*, u.*
        FROM scheduling AS s
        INNER JOIN user AS u ON (s.fk_client = u.id)
        WHERE s.fk_employee = 2;
        ';        
        
        $stmt = $conn->prepare($query);
        //$stmt->bindValue(':fk_employee', $employee);
        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum agendamento encontrado!");

        return $result;
    }

    public function getScheduling(int $id){
        $conn = Connection::getDb();
        /*
        $query = '
        SELECT * FROM scheduling AS s 
        INNER JOIN user AS u ON (s.fk_client = u.id)
        WHERE s.fk_client = :id
        ';
        */
        $query = 'SELECT s.id AS scheduling_id, s.*, u.*
        FROM scheduling AS s
        INNER JOIN user AS u ON (s.fk_client = u.id)
        WHERE s.fk_client = :id';
        
        $stmt = $conn->prepare($query);
        //$stmt->bindValue(':fk_employee', $employee);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) || empty($result)) throw new \Exception("Nenhum agendamento encontrado!");

        return $result;
    }

    public function postScheduling($data){
        $conn = Connection::getDb();
        $query = '
        INSERT INTO scheduling (start, end, fk_service, fk_client, fk_employee, fk_city) 
        VALUES (:start, :end, :fk_service, :fk_client, :fk_employee, :fk_city)
        ';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':start', $data['start']);
        $stmt->bindValue(':end', $data['end']);
        $stmt->bindValue(':fk_service', $data['fk_service']);
        $stmt->bindValue(':fk_client', $data['fk_client']);
        $stmt->bindValue(':fk_employee', 2);
        $stmt->bindValue(':fk_city', 1);
        
        $result = $stmt->execute() ? 'Agendamento realizado com sucesso!' : 'Falha no agendamento!';
        return $result;
    }

}