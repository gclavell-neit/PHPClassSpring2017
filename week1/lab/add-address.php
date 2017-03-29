<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './models/dbconnect.php';
        require_once './models/util.php';
        require_once './models/addressCRUD.php';
        require_once './models/validation.php';
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        $errors = [];
        $message = '';
        $states = getStates();

        if (isPostRequest()) {
            
            if(empty($fullname)){
                $errors[] = 'Full name is required';
            }
            if ( !isEmailValid($email) ){
                 $errors[] = 'Email is not valid';
            }
            if(empty($addressline1)){
                $errors[] = 'Address is required';
            }
            if(empty($city)){
                $errors[] = 'City is required';
            }
            if(empty($state)){
                $errors[] = 'State is required';
            }
            if(!isZipValid($zip)){
                $errors[] = 'Zipcode must be 5 numbers';
            }
            if(!isDateValid($birthday)){
                $errors[] = 'Birthday is not valid';
            }
            if(count($errors) === 0){
                if(createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)){
                    $message = 'Address Added';
                    $fullname = '';
                    $email = '';
                    $addressline1 = '';
                    $city = '';
                    $state = '';
                    $zip = '';
                    $birthday = '';
                }else{
                    $errors[] = 'Could not Add to the database';
                }
            }
            
        }
        
        include './templates/add-address.html.php';
        include './templates/errors.html.php';
        include './templates/messages.html.php';
        
        ?>
    </body>
</html>
