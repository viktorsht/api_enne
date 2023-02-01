<?php

namespace App\Models;
use App\Connection;

class DayActive{

    public function getDayActive($employee, $city){
        $conn = Connection::getDb();
        $query = '
        SELECT da.id, d.name, d.initials FROM day_active AS da
        INNER JOIN day AS d ON (da.fk_day = d.id)
        WHERE da.fk_employee = :fk_employee AND da.fk_city = :fk_city
        ';
        //AND da.fk_city = :fk_city
        //$query = 'SELECT da.id FROM day_active AS da';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':fk_employee', $employee);
        $stmt->bindValue(':fk_city', $city);
        $stmt->execute();
        
        #echo "Employee: " . gettype($employee) . "<br>";
        #echo "City: " . gettype($city) . "<br>";

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
    }
}