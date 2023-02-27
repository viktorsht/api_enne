<?php

namespace App\Models;
use App\Connection;

class DeleteScheduling{

    public function deleteScheduling($data){

        $conn = Connection::getDb();
        
        $query = 'DELETE FROM scheduling WHERE fk_client=:fk_client AND start=:start';

        $stmt = $conn->prepare($query);
        /*
        $stmt->bindValue(':end', $data['end']);
        $stmt->bindValue(':fk_service', $data['fk_service']);
        */
        $stmt->bindValue(':start', $data['start']);
        $stmt->bindValue(':fk_client', $data['fk_client']);
        
        $result = $stmt->execute() ? 'Atualização de agendamento realizado com sucesso!' : 'Falha no cadastro!';
        return $result;
    }

}


//DELETE FROM `scheduling` WHERE `scheduling`.`id` = 1 