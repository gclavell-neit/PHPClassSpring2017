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
        $name = $_GET['file'];
        echo $name;
        ?>
        
        <?php
        /* ****************UPDATE FILE**************** */        
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$name;
        
        //http://php.net/manual/en/fileinfo.constants.php
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        
        var_dump($type, '<br /><br />');
        
        //http://php.net/manual/en/function.filesize.php
        var_dump(filesize($file), '<br /><br />');
        
        /*
         * To delete a file use unlink
         * unlink($file) - But once it's gone, it's gone. Use carefully
         */
        
        
        // http://php.net/manual/en/class.splfileinfo.php
        $finfo = new SplFileInfo($file);
        
        if ( $finfo->isFile() ) {
            var_dump($finfo->getRealPath(), '<br /><br />');
            var_dump($finfo->getFilename(), '<br /><br />');
            var_dump(date("l F j, Y, g:i a", $finfo->getMTime()), '<br /><br />');
            var_dump($finfo->getSize(), '<br /><br />');
            var_dump($finfo->getPathname(), '<br /><br />');
            
        }
        ?>
    </body>
</html>
