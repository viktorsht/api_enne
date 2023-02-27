<?php

namespace App\Models;
use App\Connection;

class TimeActive{

    public function getTimeActive(int $day){
        /*
            int $employee, int $city,
            */
        $conn = Connection::getDb();
        $query = '
        SELECT ta.id, t.time, ta.fk_employee AS employee,ta.fk_city AS city, ta.fk_day AS day FROM time_active AS ta
        INNER JOIN time AS t ON (ta.fk_time = t.id)
        WHERE ta.fk_employee=2 AND ta.fk_city=1 AND ta.fk_day=:fk_day
        ';

        $stmt = $conn->prepare($query);
        
        //$stmt->bindValue(':fk_employee', 2);
        //$stmt->bindValue(':fk_city', 1);
        $stmt->bindValue(':fk_day', $day);
        /*
        $stmt->bindValue(':employee', $employee);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':day', $day);
        */
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }

}