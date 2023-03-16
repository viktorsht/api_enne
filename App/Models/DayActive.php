<?php

namespace App\Models;
use App\Connection;

class DayActive{

    public function getDayActive(){
        $conn = Connection::getDb();
        $query = '
        SELECT da.id, da.status, d.name, d.initials FROM day_active AS da
        INNER JOIN day AS d ON (da.fk_day = d.id)
        WHERE da.fk_employee = 1 AND da.fk_city = 1 
        ';
        
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum dia ativo encontrado!");

        return $result;
    }

    public function postDayActive($data){
        $conn = Connection::getDb();
        $query = 'UPDATE day_active SET status=:status WHERE id=:id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':status', $data['status']);
        $result = $stmt->execute() ? 'Dia ativo cadastrado com sucesso!' : 'Falha no cadastro do dia!';
        return $result;
    }
}