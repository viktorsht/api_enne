<?php

namespace App\Models;
use App\Connection;

class User{

    public function getUser(int $id){
        $conn = Connection::getDb();

        $query = "SELECT email,password,name FROM user WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");

        return $result;
        
    }

    public static function getAllUser() {
        $conn = Connection::getDb();

        $query = 'SELECT name, email FROM user';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(!is_array($result) ) throw new \Exception("Nenhum usuário encontrado!");
        #var_dump($result);
        return $result;
    }
/*
    public function insert($data){
        $conn = Connection::getDb();
        $query = 'INSERT INTO user (name, surname, email, cpf, password, fk_level, fk_address, fk_social) VALUES (:n, :s, :e, :cpf, :pass, :fkle, :fkadd, :fksocial)';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':n', $data['name']);
        $stmt->bindValue(':s', $data['surname']);
        $stmt->bindValue(':e', $data['email']);
        $stmt->bindValue(':cpf', $data['cpf']);
        $stmt->bindValue(':pass', md5($data['password']) );
        #$stmt->bindValue(':cr', $data['created']);
        #$stmt->bindValue(':mod', $data['modified']);
        $stmt->bindValue(':fkle', $data['fk_level']);
        $stmt->bindValue(':fkadd', 1);
        $stmt->bindValue(':fksocial', 1);
        $result = $stmt->execute() ? 'Cadastro realizado com sucesso!' : 'Falha no cadastro!';
        return $result;
    }
    */
}
