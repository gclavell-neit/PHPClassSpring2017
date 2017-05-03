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
        
        $name = filter_input(INPUT_GET,'file');      
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$name;
        
        //http://php.net/manual/en/fileinfo.constants.php
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        
        ?>
        
        <h2><?php echo("Name: ".$name.'<br /><br />'); ?></h2>
        <h2><?php echo("Type: ".$type.'<br /><br />') ?> </h2>
        <h2><?php echo("Size: ".filesize($file).'<br /><br />'); ?></h2>
        <?php $finfo = new SplFileInfo($file); $date = date("l F j, Y, g:i a", $finfo->getMTime());?>
        <h2><?php echo("Upload Date: ".$date.'<br /><br />'); ?></h2>
        
        
        <input type="button" value = "Delete" onclick = "window.location.href='http://localhost/PHPClassSpring2017/week4/lab/delete.php?file=<?php echo $name?>'"/>
        <a href="viewAll.php">View All</a>
        
    </body>
</html>
