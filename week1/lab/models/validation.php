<?php
/**
 * A method to check the validity of a zipcode
 * 
 * @param type $zip
 * @return boolean
 */
function isZipValid($zip){
    
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
function isDateValid($birthday){
    return (bool)strtotime($birthday);
}

/**
 * A method to check the validity of emails
 * 
 * @param type $email
 * @return boolean
 */
function isEmailValid($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
        return true;
    } 
    return false;  
}