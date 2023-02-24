<?php

namespace App\Models;
use App\Connection;

class UpdateUser{
    public function updateUser($data){
        $conn = Connection::getDb();
        $query = 'UPDATE user 
        SET name=:n,surname=:s,email=:e,cpf=:cpf,fk_level=:fkle,fk_address=:fkadd,fk_social=:fksocial
        WHERE id=:id';
        // password=:pass,
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':n', $data['name']);
        $stmt->bindValue(':s', $data['surname']);
        $stmt->bindValue(':e', $data['email']);
        $stmt->bindValue(':cpf', $data['cpf']);
        //$stmt->bindValue(':pass', md5($data['password']) );
        $stmt->bindValue(':fkle', $data['fk_level']);
        $stmt->bindValue(':fkadd', 1);
        $stmt->bindValue(':fksocial', 1);
        /*
        name = :n, surname = :s, email = :e, cpf = :cpf, password = :pass,fk_level = :fkle,fk_address = :fkadd,fk_social = :fksocial
        */
        $result = $stmt->execute() ? 'Cadastro realizado com sucesso!' : 'Falha no cadastro!';
        return $result;
    }
}