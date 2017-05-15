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
        <h1>Admin Page</h1>
        
        <?php
        
        include './autoload.php';
        $errors = [];
        $message = '';
        $util = new Util();
        $accounts = new Accounts();
       
        include './views/session_access.html.php';
        include './views/messages.html.php';    
         
        if($util->isPostRequest()){
            session_destroy();
            $util->redirect("login.php");
        }
        ?>
        <h5>User ID: <?php echo $_SESSION['user_id']?></h5>
        <h5>Email: <?php echo $accounts->getEmailById($_SESSION['user_id'])?></h5>
        <?php include './views/logout.html.php'; ?>  

    </div>
    </body>
    
</html>
