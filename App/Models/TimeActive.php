<?php

namespace App\Models;
use App\Connection;

class TimeActive{

    public function getTimeActive(int $day){
        
        $conn = Connection::getDb();
        $query = '
        SELECT ta.id, ta.status, t.time, ta.fk_employee AS employee,ta.fk_city AS city, ta.fk_day AS day FROM time_active AS ta
        INNER JOIN time AS t ON (ta.fk_time = t.id)
        WHERE ta.fk_employee=1 AND ta.fk_city=1 AND ta.fk_day=:fk_day
        ';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':fk_day', $day);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum tempo ativo encontrado!");

        return $result;
    }

    public function updateTimeActive($data){
        $conn = Connection::getDb();
        $query = 'UPDATE time_active SET status=:status WHERE id=:id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':status', $data['status']);
        $result = $stmt->execute() ? 'Atualização realizada com sucesso!' : 'Falha na atualização!';
        return $result;
    }

}