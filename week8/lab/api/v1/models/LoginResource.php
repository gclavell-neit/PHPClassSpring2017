<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginResource
 *
 * @author 001378362
 */
class LoginResource extends DBSpring implements IRestModel{
    
    public function getAll() {
        $stmt = $this->getDb()->prepare("SELECT * FROM address");
        $results = array();      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }
    
    public function get($id) {
       
        $stmt = $this->getDb()->prepare("SELECT * FROM address where address_id = :address_id");
        $binds = array(":address_id" => $id);

        $results = array(); 
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return $results;
                
    }
    
    public function post($serverData) {
        /* note you should validate before adding to the data base */
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
        ":email" => $serverData['email']
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($serverData['password'], $results['password'])){
                return $serverData['email'];
            }
         }
    
        return false;
        
        
    }
    
    
    //put your code here
}
