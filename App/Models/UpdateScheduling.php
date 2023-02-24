<?php

namespace App\Models;
use App\Connection;

class UpdateScheduling{

    public function updateScheduling($data){

        $conn = Connection::getDb();
        $query = 'UPDATE scheduling SET start=:start,end=:end,fk_service=:fk_service
        WHERE fk_client=:fk_client';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':start', $data['start']);
        $stmt->bindValue(':end', $data['end']);
        $stmt->bindValue(':fk_service', $data['fk_service']);
        $stmt->bindValue(':fk_client', $data['fk_client']);
        
        $result = $stmt->execute() ? 'Atualização de agendamento realizado com sucesso!' : 'Falha no cadastro!';
        return $result;
    }

}