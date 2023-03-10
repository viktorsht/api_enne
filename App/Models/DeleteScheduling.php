<?php

namespace App\Models;
use App\Connection;

class DeleteScheduling{

    public function deleteScheduling($data){

        $conn = Connection::getDb();
        
        $query = 'DELETE FROM scheduling WHERE id=:scheduling_id';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':scheduling_id', $data['scheduling_id']);
        
        $result = $stmt->execute() ? 'Remoção de agendamento realizada com sucesso!' : 'Falha na remoção do agendamento!';
        return $result;
    }

}