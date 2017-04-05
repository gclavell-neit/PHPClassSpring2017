<!DOCTYPE html>
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
        $addresses = $db->getAllAddresses();
        
        include './templates/view-address.html.php';
        ?>
        <a href="add-address.php">Add New Address</a>
    </body>
</html>
