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
        $name = filter_input(INPUT_GET,'file');
        
        unlink("uploads/".$name);
        ?>
        <h2><?php echo $name?> has been deleted</h2>
        <a href="viewAll.php">View All</a>
    </body>
</html>
