<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounts
 *
 * @author 001378362
 */
class Accounts extends DB {
    
    public function __construct() {
        $dbConfig = array(
                "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
                "DB_USER"=>'root',
                "DB_PASSWORD"=>''
            );
        parent::__construct($dbConfig);
    }

    

    public function signup($email, $password){
        $stmt = $this->getDB()->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");
    $binds = array(
        ":email" => $email,
        ":password" => password_hash($password, PASSWORD_DEFAULT)
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
    }
    
    public function login($email, $password){
        $stmt = $this->getDB()->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
        ":email" => $email
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $results['password'])){
                return $results['user_id'];
            }
         }
    
        return 0;
    }
    
    public function getEmail($email){
        $stmt = $this->getDB()->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
        ":email" => $email
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results['user_id'];
         }
    
        return 0;
    }
    
}
