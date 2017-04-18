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
    <div class="container">
        <?php
        // put your code here
        include './autoload.php';
        $errors = [];
        $message = '';
        $validator = new Validator();
        $util = new Util();
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $accounts = new Accounts();
        
        
        if($util->isPostRequest()){
            
            if ( !$validator->isEmailValid($email) ){
                 $errors[] = 'Email is not valid';
            }
            if(empty($password)){
                $errors[] = 'Password must be entered';
            }
            if ( $accounts->getEmail($email)>0 ){
                 $errors[] = 'Email already associated with an account';
            }elseif
                ($accounts->signup($email, $password)){
                    $message = 'Signup Successful! Please log in';
            }
            else{
                $errors[] = 'Sign up not successful';
            }
        }
        include './views/signup.html.php';
        include './views/errors.html.php';
        include './views/messages.html.php';
      
        ?>
        <a href="login.php">Log In</a>
    </div>
    </body>
</html>