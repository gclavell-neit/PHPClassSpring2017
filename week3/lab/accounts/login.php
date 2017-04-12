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
        session_start();
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
            $login_info = $accounts->login($email, $password);
            if($login_info>0){
                $_SESSION['user_id'] = $login_info;
                $_SESSION['email'] = $email;
                $util->redirect("admin.php");
            }else{
                $errors[] = 'Sign in not successful';
            }
        }
        include './views/login.html.php';
        include './views/errors.html.php';
        include './views/messages.html.php';
        ?>
        <a href="signup.php">Sign Up</a>
    </div>
    </body>
</html>
