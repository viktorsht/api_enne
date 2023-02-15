<?php

namespace App\Models;
use App\Connection;

class TimeActive{

    public function getTimeActive($employee, $city, $day){
        $conn = Connection::getDb();
        $query = '
        SELECT ta.id, t.time, ta.fk_employee AS employee,ta.fk_city AS city, ta.fk_day AS day FROM time_active AS ta
        INNER JOIN time AS t ON (ta.fk_time = t.id)
        WHERE ta.fk_employee = :fk_employee AND ta.fk_city = :fk_city AND ta.fk_day = :fk_day
        ';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':fk_employee', $employee);
        $stmt->bindValue(':fk_city', $city);
        $stmt->bindValue(':fk_day', $day);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }

}