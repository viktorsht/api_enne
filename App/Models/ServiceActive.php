<?php

namespace App\Models;
use App\Connection;

class ServiceActive{

    public function getServiceActive($employee, $city, $day){
        $conn = Connection::getDb();
        $query = '
        SELECT sa.id, s.name, s.duration, sa.fk_service, sa.fk_city, sa.fk_employee, sa.fk_day FROM service_active AS sa
        INNER JOIN service AS s ON (sa.fk_service = s.id)
        WHERE sa.fk_employee = 2
        ';
        


        $stmt = $conn->prepare($query);
        $stmt->bindValue(':fk_employee', $employee);
        $stmt->bindValue(':fk_city', $city);
        $stmt->bindValue(':fk_day', $day);
        
        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum serviço encontrado!");

        return $result;
    }
}