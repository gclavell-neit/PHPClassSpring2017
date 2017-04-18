<?php

/**
 * Description of Validator
 *
 * @author GFORTI
 */
class Validator {
        /**
     * A method to check the validity of a zipcode
     * 
     * @param type $zip
     * @return boolean
     */
    public function isZipValid($zip){

        $zipRegex = '/^[0-9]{5}$/';

        if(preg_match($zipRegex, $zip)){
            return true;
        }
        return false;
    }

    /**
     * A method to check the validity of a date
     * 
     * @param type $birthday
     * @return type
     */
    public function isDateValid($birthday){
        return (bool)strtotime($birthday);
    }

    /**
     * A method to check the validity of emails
     * 
     * @param type $email
     * @return boolean
     */
    public function isEmailValid($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
            return true;
        } 
        return false;  
    }
}
