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
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$name;
        $fileObject = new SplFileObject($file, "r");
        
        //http://php.net/manual/en/fileinfo.constants.php
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        
        ?>
        
        <h2><?php echo("Name: ".$name.'<br /><br />'); ?></h2>
        
        <h2><?php echo("Type: ".$type.'<br /><br />') ?> </h2>
        <h2><?php echo("Size: ".filesize($file).'<br /><br />'); ?></h2>
        <?php $finfo = new SplFileInfo($file); $date = date("l F j, Y, g:i a", $finfo->getMTime());?>
        <h2><?php echo("Upload Date: ".$date.'<br /><br />'); ?></h2>
        
        <a href='./delete.php?file=<?php echo $name?>'>Delete</a>
        <a href="viewAll.php">View All</a>
        
        <div>
        <?php if ($type == 'image/jpeg' || $type == 'image/gif' || $type == 'image/png'): ?>
        <img src="./uploads/<?php echo $name?>">
        <?php elseif ($type == 'text/plain'): ?> 
        <textarea><?php echo $fileObject->fread($fileObject->getSize())?></textarea>
        <?php elseif ($type == 'text/html' || $type == 'application/pdf'): ?>
        <iframe src="./uploads/<?php echo $name?>">
        <?php else: ?>
        <object src="./uploads/<?php echo $name?>"><embed src="./uploads/<?php echo $name?>"></embed></object>
        <?php endif; ?>
        </div>
        
    </body>
</html>
