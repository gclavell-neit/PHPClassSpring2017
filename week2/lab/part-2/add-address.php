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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        require_once './autoload.php';
        
        $db = new DBAddress();
        $validtor = new Validator();
        $util = new Util();
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        $errors = [];
        $message = '';
        $states = $util->getStates();

        if ($util->isPostRequest()) {
            
            if(empty($fullname)){
                $errors[] = 'Full name is required';
            }
            if ( !$validtor->isEmailValid($email) ){
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
            if(!$validtor->isZipValid($zip)){
                $errors[] = 'Zipcode must be 5 numbers';
            }
            if(!$validtor->isDateValid($birthday)){
                $errors[] = 'Birthday is not valid';
            }
            if(count($errors) === 0){
                if($db->createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)){
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
        <a href="index.php">View All Addresses</a>
    </body>
</html>
